# **Bad Practices And Comments:**

**Project Structure Enhancement:**

Added new directories for Interfaces and Model to better organize the code.
Defined namespaces for these directories to clearly indicate the location of each object.
Used the use statement to import other objects, improving readability and maintainability.

**Strategy Design Pattern:**

Applied the strategy design pattern to inject the Comment and News objects into other classes.
This promotes dependency inversion, reducing tightly coupled dependencies and making the code more flexible and testable.

**Interface Implementation:**

Noticed that both Comment and News objects have similar methods and properties.
Created a common interface to implement these shared methods, promoting code reuse and consistency.
Strict Typing:

Enabled strict typing in the code, adding type hints to method arguments and return types.
This improves code readability and enforces stricter rules, reducing the likelihood of runtime errors due to type mismatches.

**Object Flexibility:**

Enhanced Comment and News objects to be easily convertible to arrays or JSON strings.
This provides greater flexibility for data manipulation and presentation.

**SQL Prepared Statements:**

Implemented prepared statements for SQL queries to prevent SQL injection attacks.
This enhances the security of the application by sanitizing user inputs.

**Base Repository for CRUD Operations:**

Created a base repository class encapsulating common CRUD functionalities.
This promotes code reuse and makes it easier to extend CRUD functionalities in the future.

**Separation of Concerns:**

Separated database queries and writes into distinct responsibilities, adhering to the single responsibility principle from SOLID.
This makes the codebase cleaner and easier to maintain.

**Dependency Injection and Inversion:**

Used dependency injection to provide necessary dependencies, enhancing modularity and testability.
Applied dependency inversion to avoid tightly coupled code, making the system more flexible and easier to modify.
