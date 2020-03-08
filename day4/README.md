## Reading Matt Zandstra Book — PHP Objects

### traits

had an experiments with traits and learned exampled from book. 
Traits don't have own context, so static parameters 
can be changed

### Reflection

Learned basic ReflectionClass usage

### Late static binding

Learned difference between self and static bindings. Self points
to the class that is used, static points to the class that was called
from parent stack

### Exceptions & Closures

Closure usage and simple examples

### UML

Learned UML diagram usage. It is explained the lines and arrows usage.

### Patterns

Learning design pattern usage

#### Strategy

it is recommended to use Strategy instead of direct inherits. 
In case of class inheritance you have to duplicate code fragments 
or parent should define which logic to execute

#### Factory Method & Abstract Factory

these patterns are creational. It is easy to horizontally spread the entity implementations.
Factory Method provides an interface that must be implemented by inherited class. That class returns required class

#### Prototype

This type of Factory implementation returns objects clone, that could be used. Each object that returned has
initial configuration

#### Service locator

Service locator provides an approach of Factory governance

#### Composite

Composite is a pattern that assembles classes with similar interface and behaviour. It can group them, add new unit
or remove it. The advantage is that units can exist and one unit or easily divided into units

#### Decorator

This is a pattern that more flexible inheritance by wrapping one class with another. It allows include one decorator
to another and execute function in a chain

#### Facade

Hides implementation of logic that uses external library

#### Interpreter

Pattern allows mini-language creation. It creates expression and operators, and then interprets literals and values
by operators

#### Observer

Creates relation between subject and observers. Observers can "lister" any changes that emits subject. In this
example we made simple implementation of built-in class SplSubject and SplObserver

#### Visitor

Pattern allows expand the current functional entities by injecting a visitor

#### Command

Command allows implement concrete logic of business application

#### NullObject

Use special empty class that returns default|null values instead of checking "null" condition

#### Registry

Singleton with storage. Keeps instances of configured classes

#### Front Controller *

Single entry point pattern

#### Application Controller *

Front Controller on steroids

#### Transaction Script *

When you don't have complicated inheritance and make Base and Logic class

#### Domain Model *

When the class reflects Database structure

#### Data Mapper *

Mapper class is a layer above Entity class. Mapper uses special class that contains searches data 

#### Identity Map *
   
   
Stores class instances and used for preventing duplications

#### Unit of work *

Map of changed objects

#### Lazy load *

Get the real object as later as it possible, when client requires

#### Domain Object Factory

Creates collection of domain object

#### Identity Object | Data Transfer Object *

Allows wrapping database queries with class functions

#### Selection Factory & Update Factory *

### Phing *

Played with phing (set up and command basics)

### Vagrant *

Infrastructural software that allows OS virtualization

### Jenkins *

Played a little bit with it

