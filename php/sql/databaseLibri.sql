# -- Script creazione db, eseguitelo dopo che siete loggati nel DBMS, MySQL e' il DMBS usato

create user 'u2'@'localhost' identified by 'pass';



use exam;

create table books
(
    id INT AUTO_INCREMENT primary key,
    isbn varchar(15) unique not null,
    author varchar(64),
    title varchar(128) not null,
    publisher varchar(64),
    ranking int,
    year int,
    price float
);

insert into books values ("abcd1","Verga","I malavoglia", "p1",5,2000,9.99);
insert into books values ("abcd2","Aligheri","La divina commedia", "p2",5,1200,10.99);
insert into books values ("abcd3","Pirandello","Uno, nessuno, centomila", "p3",6,2001,19.99);
insert into books values ("abcd4","Wilde","Dorian Gray", "p4",7,2002,11.99);
insert into books values ("abcd5","Orwell","1984", "p5",8,2003,12.99);
insert into books values ("abcd6","Fitzgerald","The great gatzby", "p6",9,2004,9.1399);


grant select on exam.books to 'u2'@'localhost';

# -- Da notare che la base di dati e' dummy e' va hostata localmente affinche' lo script funzioni
# -- drop schema books; (per cancellare il DB)
# -- drop table books; (per cancellare la tabella)
# -- drop user 'gb'@'localhost'; (per cancellare l'utente ed automaticamente revocare i privilegi)
#-- prima creare il database, entrare e Grant ALL Privileges