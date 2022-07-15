create database contacts;
use contacts;

create table contacts (
	id bigint not null auto_increment,
	name varchar(255) not null,
    primary key (id)
);

create table friends (
	id bigint not null auto_increment,
    contact_id bigint not null,
    friend_id bigint not null,
    primary key (id),
    foreign key (contact_id) references contacts(id),
    foreign key (friend_id) references contacts(id)
);

insert into contacts (name) 
values ('James'), ('Robert'), ('John'), ('Michael'), ('David'), ('William'), ('Richard'), ('Joseph'), ('Thomas'), ('Charles');

insert into friends (contact_id, friend_id) 
values 
(1, 2), (1, 3), (1, 4), (1, 5), (1, 6), (1, 7),
(2, 1), (2, 4), (2, 6), 
(3, 8),
(4, 1), (4, 5), (4, 7), 
(5, 1), (5, 4), (5, 3), (5, 8), (5, 9), (5, 10);

select *
from contacts 
where 5 <
	(select count(id)
    from friends
    where contact_id = contacts.id)
;
   
select concat(con1.id, '.', con1.name, ' - ', con2.id, '.', con2.name) as 'Friends'
from contacts as con1 inner join friends as fr1 on con1.id = fr1.contact_id
	inner join contacts as con2 on con2.id = fr1.friend_id
where not exists (
	select friends.id 
    from friends
    where friends.contact_id = fr1.friend_id and friends.friend_id = fr1.contact_id and friends.id < fr1.id
    ) 
order by con1.id
;


