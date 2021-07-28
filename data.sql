create database cinema;
use cinema;

/* creer une table film */

create table film
(
	id int primary key auto_increment,
    titre varchar(50),
    annee date,
    image varchar(50)
);

/* ajout des films */

insert into film(titre, annee, image) values 
("L'étrange noel de mr Jack", "1993-12-24","/images/noel.jpg"),
("Cobra", "1986-06-10","/images/cobra.jpg"),
("Interstellar", "2014-11-07","/images/interstellar.jpg");

/* editer les film */

update film set titre ="Interstelar" where id = 3;
select * from film;

/*afficher l'annee */
select * from film where YEAR(annee)= 1993;

/*afficher l'annee à partir de: */
select * from film where YEAR(annee)>= 1993;

/* afficher par ordre decroissant date */
select * from film  order by annee desc;

/* afficher par ordre croissant date */
select * from film  order by annee asc;

/* supprimer un film */
delete from film where id = 2;
