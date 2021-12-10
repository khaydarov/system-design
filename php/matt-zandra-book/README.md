## Reading Matt Zandstra Book — PHP Objects

### Traits

Experiments with traits from the book. Traits doesn't have own context, so props can be changed

### Reflection

ReflectionClass usage. Better understanding the class significance

### Late static binding

Read the difference between `self` and `static` (Ex. `new self()` or `new static()`) bindings. `Self` points
the class that calls the constructor and `static` points to the root class that was called
from parent stack

### Exceptions & Closures

Closure usage examples

### UML

UML diagrams and explaination of the lines and arrows

### Patterns

Design pattern from the book

#### Strategy

Recommended to use `Strategy` instead of direct inheritance. 
In case of class inheritance you have to duplicate code fragments 
or parent should define which logic to execute

#### Factory Method & Abstract Factory

`Creational` patterns that makes easy to expand the entity behaviour.
`Factory Method` provides an interface that must be implemented by inherited class.

#### Prototype

Type of Factory implementation returns object clone, that could be used. Each object that returned has
initial configuration

#### Service locator

Service locator provides an approach of Factory governance

#### Composite

Pattern that assembles classes with similar interface and behaviour. It can group, add or remove units (similar included classes).

#### Decorator

Pattern makes more flexible inheritance by wrapping one class with another. It allows to include one decorator
to another and execute function in a chain

#### Facade

Useful when using third-party solution

#### Interpreter

Pattern allows mini-language creation. It creates expressions and operators, and then interprets literals and values
by operators

#### Observer

Creates relation between subject and observers. Observers can "listen" any changes that emits subject. In the
example there is a simple implementation of built-in class SplSubject and SplObserver

#### Visitor

Pattern allows to expand the current functional entities by injecting a visitor (new functionality)

#### Command

Command allows implement concrete logic of business application

#### NullObject

Special empty class that returns default|null values instead of checking "null" condition

#### Registry

Singleton with storage. Stores instances of configured classes

#### Front Controller *

Single entry point pattern

#### Application Controller *

Front Controller on steroids

#### Transaction Script *

When you don't have complicated inheritance and make `Base` and `Logic` class

#### Domain Model *

Class that reflects `Database` structure

#### Data Mapper *

Mapper class is a layer above `Entity` class. Used with special `Adapter` class that provides the data 

#### Identity Map *
   
Stores class instances and used for preventing duplications

#### Unit of work *

Map of changed objects

#### Lazy load *

Gets the real object as later as it possible, when the client requires

#### Domain Object Factory

Creates collection of domain object

#### Identity Object | Data Transfer Object *

Allows wrapping database queries with class functions

#### Selection Factory & Update Factory *

No comment yet

### Phing *

Examples with phing: set up and command basics

### Vagrant *

Infrastructural software that allows OS virtualization

### Jenkins *

Great CI/CD tool

