11/8/17
First recorded version (v.1)
Welcome to WineDB (name likely to be changed in the future).

This current version includes basic administration features. As such, an
individual with sufficient access can create, read, update, and destroy
individual users. Additionally, with access to the site's server pages, the
admin can change site variables to control who has access to specific pages.

Details of admin tools:
Add User
  - A user may not create a user with a permissions level above their own.
  - Duplicate usernames will not be created.
  - Passwords cannot be null, but have NO REQUIREMENTS FOR SECURITY.
  - Emails are not required to be unique.

Delete User
  - A deleted user is instantly removed from the database.
  - There is no way to undo this action.

List Users
  - Displays all user accounts, the associated email (if it exists), and their
    permissions level.

Update User
  - A user can only update users below their permissions level.
  - Blank passwords WILL NOT be updated
  - Blank emails WILL be updated to a blank email.
  - Permissions cannot be updated above active user's level.

More to come. . .
