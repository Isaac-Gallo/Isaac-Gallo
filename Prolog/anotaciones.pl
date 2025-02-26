%Arity - Aridad
:- dynamic animal/1.
animal(le�n).

Consola
assert(animal(oso)).

%Listing
%Eliminar - retract - retractall - abolish
%Guardar - tell, listing, told

:-dynamic animal/2.
animal(oso, omniboro).
animal(perro, carn�voro).
animal(tigre, carn�voro).
animal(humano, omn�voro).
animal(caballo, herb�voro).

%CRUD
:- dynamic animal/1.
animal.

Inicio:- consult(�archivo.pl�).

crear(A) :- asserta(animal(A)), write(�Nuevo conocimiento�).

buscar(A) :- animal(A).

eliminar(A) :- retract(animal(A)).

guardar :- tell(�archivo.pl�),
Listing(animal/1),
told,
Write(�Guardando . . . �).

fin:- guardar, retractall(animal(_)).

mostrartodo:- listing(animal/1).
