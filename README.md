# Task for SmileExpo

## Damp of DB creation:
```
create table if not exists categories
 (
     category_id    int auto_increment
         primary key,
     category_title varchar(32)   not null,
     parent_id      int default 1 not null,
     constraint category_title
         unique (category_title)
 );
 
 create table if not exists products
 (
     product_id          bigint auto_increment
         primary key,
     product_title       varchar(32)     not null,
     product_description text            null,
     product_price       float default 0 not null,
     category_id         int             not null,
     constraint product_title
         unique (product_title),
     constraint products_ibfk_1
         foreign key (category_id) references categories (category_id)
 );
 
 create table if not exists feedbacks
 (
     feedback_id     bigint auto_increment
         primary key,
     create_date     date default curdate() not null,
     feedback_author varchar(16)            not null,
     feedback_email  varchar(32)            not null,
     feedback_text   text                   null,
     product_id      bigint                 not null,
     constraint feedbacks_ibfk_1
         foreign key (product_id) references products (product_id)
 );
 
 create index if not exists product_id
     on feedbacks (product_id);
 
 create table if not exists photos
 (
     photo_id   bigint auto_increment
         primary key,
     photo_src  varchar(255) not null,
     product_id bigint       not null,
     constraint photos_ibfk_1
         foreign key (product_id) references products (product_id)
 );
 
 create index if not exists product_id
     on photos (product_id);
 
 create index if not exists category_id
     on products (category_id);
     
```
