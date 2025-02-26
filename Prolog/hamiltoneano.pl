grafo(g1, [a-b, b-c, c-d, d-a, b-d]).

arcos([huelva-sevilla, huelva-cadiz, cadiz-sevilla, sevilla-malaga,
sevilla-cordoba, cordoba-malaga, cordoba-granada, cordoba-jaen,
jaen-granada, jaen-almeria, granada-almeria]).

camino(A,Z,C) :-
camino_aux(A,[Z],C).

camino_aux(A,[A|C1],[A|C1]).
camino_aux(A,[Y|C1],C) :-
adyacente(X,Y),
not(member(X,[Y|C1])),
camino_aux(A,[X,Y|C1],C).


adyacente(X,Y) :-
arcos(L),
(member(X-Y,L) ; member(Y-X,L)).

nodos(L) :-
setof(X,Y^adyacente(X,Y),L).

hamiltoniano_1(C) :-
camino(_,_,C),
nodos(L),
length(L,N),
length(C,N).

hamiltoniano_2(C) :-
nodos(L),
length(L,N),
length(C,N),
camino(_,_,C).
