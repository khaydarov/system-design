## Top Level

JSON **MUST** contain at least one of the following top-level members

```js
const topLevel = {
    data: {}, // primary data
    errors: {}, // error objects
    meta: {} // non-standard meta-information
}
```

Also JSON **MAY** contain

```js
const topLevel = {
    ...,
    jsonapi: {}, // describes server implementation
    links: {}, // links object related to the primary data
    included: {}, // objects that are related to the primary data
}
```

> "included" must not be present if "data" does not exist in top-level

```js
const links = {
    self: {} || "", // the link that generated the current response
    related: {}, // when primary data represents a resource relationship 
}
```

Primary data **MUST** be either: single resource object or array of resource objects

## Resource objects

Resource object **MUST** contain at least one of following top-level members

```js
const data = {
    id: any, // resource identifier
    type: any, // resource type
}
```

> "id" is not required at client if resource is new

Resource in addition **MAY** contain any of these members

```js
const data = {
    ...,
    attributes: {}, // representation some of the resource's data
    relationship: {}, // describes relationships between the resource and other JSON:API resource
    links: {}, // contains links related to the resource
    meta: {}, // contains non-standard meta-information about a resource that can not be represented in attributes
}
```

### Example

```js
const data = {
    id: 1,
    type: "article",
    attributes: {
        title: "Current article's title",
        content: "Article's content"
    },
    links: {
        self: "/articles/1?include=author"  
    },
    relashionship: {
        author: {
            data: {
                id: 9,
                type: "user"
            },
            links: {
                self: "/articles/1/relationships/author",
                related: "/articles/1/author"
            }
        }
    }
}
```

Relationship **MUST** contain at least one of the following members

```js
const relationship = {
    links: {
        self: '', // relationship link (allows to manipulate relationship directly)
        related: {}, // ...
    },
    data: {}, // object linkage
    meta: {}, // non-standard relationship data
}
```

## Compound documents

To reduce the number of HTTP requests, servers **MAY** allow responses that include
related resources along with the requested primary resources

```js
const response = {
    data: [{
        id: "1",
        type: "article",
        attributes: {
            title: "Current article title"
        },
        links: {
            self: "/articles/1"
        },
        relationships: {
            author: {
                links: {
                    self: "/articles/1/relationship/author",
                    related: "/articles/1/author"
                },
                data: {
                    id: "9",
                    type: "user"
                }
            },
            comments: {
                links: {
                    self: "/articles/1/relationship/comments",
                    related: "/articles/1/comments"
                },
                data: [
                    {
                        id: "5",
                        type: "comment"
                    },
                    {
                        id: "12",
                        type: "comment"
                    }
                ]
            }
        }
    }],
    included: [
        {
            id: "9",
            type: "user",
            attributes: {
                firstName: "Dan",
                lastName: "Gebhardt"
            },
            links: {
                self: "/users/9"
            }
        },
        {
            id: "5",
            type: "comment",
            attributes: {
                body: "First"
            },
            relationship: {
                author: {
                    data: {
                        id: "2",
                        type: "user"
                    }
                }
            },
            links: {
                self: "/comments/5"
            }
        },
        {
            id: "12",
            type: "comment",
            attributes: {
                body: "Second"
            },
            relationship: {
                author: {
                    data: {
                        id: "9",
                        type: "user"
                    }
                }
            },
            links: {
                self: "/comments/12"
            }
        }
    ]
}
```

## Meta information

Where specified, a meta member can be used to include non-standard meta-information. The value of each meta member MUST be an object (a “meta object”).

```js
const response = {
    ...,
    meta: {
        copyright: "Copyright 2021 ...",
        authors: [
            'Evan',
            'Michel',
            'Frankfurt',
            'Berlin'
        ]
    }
}
```

## Links

```js
const links = {
    related: {
        href: "/articles/1/comments",
        meta: {
            count: 30
        }
    }
}
```

## Fetching data

### Fetching resources

A server **MUST** support fetching resource for every URL provided and **MUST**
respond a resource with an array of `resource objects` or empty array.

For a individual resource a server **MUST** respond with single `resource object` or `null`

### Responses

```js
{
    links: {
        self: "/articles/1/relationships/tags",
        related: "/articles/1/tags"
    },
    data: [
        {
            id: 1
            type: "tags",
        },
        {
            id: 2,
            type: "tags"
        }
    ]
}
```

> Server **MUST** respond _404 NOT FOUND_ when the parent resource of the relationship does not exist

### Inclusion of Related Resources

if an endpoint supports the include parameter and a client supplies it, the server **MUST NOT** include unrequested resource objects in the included section of the compound document.

if a server is unable to identify a relationship path or does not support inclusion of resources from a path, it **MUST** respond with `400 Bad Request`

```http request
GET /articles/1?include=author,comments.author HTTP/1.1
Accept: application/vnd.api+json
```

> A server may choose to expose a deeply nested relationship such as comments.author as a direct relationship with an alias such as comment-authors. This would allow a client to request /articles/1?include=comment-authors instead of /articles/1?include=comments.author. By abstracting the nested relationship with an alias, the server can still provide full linkage in compound documents without including potentially unwanted intermediate resources.

### Fields

A client **MAY** request that an endpoint return only specific fields in the response on a per-type basis by including a `fields[TYPE]` parameter

```http request
GET /articles?include=author&fields[articles]=title,body&fields[people]=name HTTP/1.1
Accept: application/vnd.api+json
```

### Sorting

A server **MAY** choose to support requests to sort resource collections according to one or more criteria (“sort fields”)

```http request
GET /people?sort=age,name HTTP/1.1
Accept: application/vnd.api+json
```

if the server does not support sorting as specified in the query parameter sort, it **MUST** return `400 Bad Request`

### Pagination

Pagination links **MUST** appear in the links object that corresponds to a collection.
To paginate the primary data, supply pagination links in the top-level links object. To paginate an included collection returned in a compound document, supply pagination links in the corresponding links object.

The following keys **MUST** be used for pagination links:

- first: the first page of data
- last: the last page of data
- prev: the previous page of data
- next: the next page of data

## Creating, Updating and Deleting Resources

A server **MAY** allow resources of a given type to be created. It **MAY** also allow existing resources to be modified or deleted.

A request **MUST** completely succeed or fail (in a single “transaction”). No partial updates are allowed.

### Creation

```http request
POST /photos HTTP/1.1
Content-Type: application/vnd.api+json
Accept: application/vnd.api+json

{
  "data": {
    "type": "photos",
    "attributes": {
      "title": "Ember Hamster",
      "src": "http://example.com/images/productivity.png"
    },
    "relationships": {
      "user": {
        "data": { "type": "people", "id": "9" }
      }
    }
  }
}
```