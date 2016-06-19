# BookStore
My first repository for my training project
This application is imitation of the online book store, and is designed to Yii2 for training purposes. As a template selected basic. The application consists of the frontend and backend parts. The operation of the frontend is provided StoreController and partially OrderController. The functioning of the backend - AdminController, BookController, CategoryController and partially OrderController. StoreController responsible for external representation of the visitors' book, book search, organization and work of the visitor with a shopping cart. OrderController carries visitors orders add (frontend part) and their subsequent processing store (the backend part). AdminController responsible for managing users store - administrators, editors. BookController building full of books and management infrastructure of their data, including the control of their images. CategoryController manages categories of books. The database consists of 60 books, divided into 3 categories. Store management provides the administrator and editor.
# For project required:
PHP >= 5.4,
MySql,
Apach.
Clone this repository to www folder on your web server. You need to specify the credentials of connection to MySql server. Edit file basic/config/db.php and set your username, password, database name from your MySql server.
