%Gallo Isaac - 221978566

%  * * *    Á R B O L E S    * * *

%Declaración del árbol de mi nombre Isaac Gallo
arbolNombre(arbol(c, arbol(a,arbol(s,i,a),''),arbol(l,arbol(a,g,l),o))).

% Recorrido en inorden
% arbolNombre(Arbol), inorden(Arbol).
inorden(arbol(Raiz,Hizq, Hder)):-
    inorden(Hizq), write(Raiz),
    inorden(Hder),!.
inorden(H) :- write(H).

% Recorrido en preorden
% % arbolNombre(Arbol), preorden(Arbol).
preorden(arbol(Raiz, Hizq, Hder)) :-
    write(Raiz),
    preorden(Hizq),
    preorden(Hder), !.
preorden(H) :- write(H).

% Recorrido en postorden
% arbolNombre(Arbol), postorden(Arbol).
postorden(arbol(Raiz, Hizq, Hder)) :-
    postorden(Hizq),
    postorden(Hder),
    write(Raiz), !.
postorden(H) :- write(H).

% Declaración de la expresión aritmética
expresion(arbol('*', arbol('/', arbol('*', 87, 8), arbol('+', 2, 10)), arbol('/', 12, arbol('-', 11, 5)))).

% Recorrido infijo
% expresion(A), infijo(A).
infijo(arbol(Operador, Izq, Der)) :-
    write('('),
    infijo(Izq),
    write(Operador),
    infijo(Der),
    write(')').
infijo(Num) :-
    write(Num).

% Recorrido prefijo
% expresion(A), prefijo(A).
prefijo(arbol(Operador, Izq, Der)) :-
    write(Operador),
    write('('),
    prefijo(Izq),
    prefijo(Der),
    write(')').
prefijo(Num) :-
    write(Num).

% Recorrido postfijo
% expresion(A), postfijo(A).
postfijo(arbol(Operador, Izq, Der)) :-
    write('('),
    postfijo(Izq),
    postfijo(Der),
    write(Operador),
    write(')').
postfijo(Num) :-
    write(Num).

%Buscar elemento de un árbol
%arbolNombre(N), buscar(letra, N).
%expresion(E), buscar(signo/número, E).
buscar(E, arbol(_, Izq, Der)) :-
    buscar(E, Izq);
    buscar(E, Der).
buscar(E, E) :-write('true').
buscar(E, arbol(E,_,_)) :-write('true').

%Contar los nodos de un árbol
%arbolNombre(N), contar_nodos(N, Numero_Nodos).
%expresion(E), contar_nodos(E, Numero_Nodos).
contar_nodos(arbol(_, Izq, Der), Cantidad) :-
    contar_nodos(Izq, CantidadIzq),
    contar_nodos(Der, CantidadDer),
    Cantidad is CantidadIzq + CantidadDer + 1,!.

contar_nodos(H, Cantidad):-
    H\=='',Cantidad is 1;
    Cantidad is 0,!.

%Por punto extra
%Contar hojas de un árbol
%arbolNombre(N), contar_hojas(N, Numero_Hojas).
%expresion(E), contar_hojas(E, Numero_Hojas).
contar_hojas(arbol(_, Izq, Der), Hojas) :-
    contar_hojas(Izq, HojasIzq),
    contar_hojas(Der, HojasDer),
    Hojas is HojasIzq + HojasDer.

contar_hojas(H, Hojas):-
    H\=='',Hojas is 1;
    Hojas is 0.

%   * * *    G R A F O S    * * *

%Declaración de un grafo con hechos/predicados.
g1(a,b).
g1(a,d).
g1(a,i).
g1(b,a).
g1(b,c).
g1(b,e).
g1(c,b).
g1(d,e).
g1(d,i).
g1(d,a).
g1(e,b).
g1(e,d).
g1(e,f).
g1(f,e).
g1(f,me).
g1(i,a).
g1(i,d).
g1(me,f).

%Imprimir el salto del recorrido
imp_salto(N1,N2) :- write(N1), write(' -> '), write(N2), nl.

%Recorrido para el grafo g1
%camino(Origen, Destino).
%camino(a, me).
camino(O,D) :- g1(O,D) , imp_salto(O,D) , !.
camino(O,D) :- g1(O,Dt) , imp_salto(O,Dt) , camino(Dt,D).
camino(O,D,Int) :- g1(O,Int) , g1(Int, D).

%Grafos con listas
%Declaración de grafos como listas.
grafo(australia, [ao-tn, ao-as, tn-as, tn-q,as-q,as-v,as-ng,q-ng,ng-v,t-t]).

grafo(australia2, [ao-tn, ao-as, tn-as, tn-q,as-q,as-v,as-ng,q-ng,ng-v]).


grafo(gnn, [a-i,a-b,a-d,b-c,b-e,d-e,d-i,e-f,f-m]).

%Identificar si 2 nodos son vecinos
%vecino(nombre_Grafo, Nodo1, Nodo2).
%vecino(australia, as, tn).
vecino(G,N1,N2) :-
    grafo(G,La),
    (member(N1-N2, La);member(N2-N1,La)).

%Obtener todos los vecinos de un nodo.
%vecinoN(nombre_Grafo, Nodo, Vecinos).
%vecinoN(australia, as, Vecinos).
vecinoN(G,N,V):-
    grafo(G,La),
    findall(Ad, (member(N-Ad, La); member(Ad-N, La)), V).

%Imprimir todos los nodos existentes en un grafo
%nodos(nombre_Grafo, Total_Nodos).
%nodos(australia, Total_Nodos).
nodos(G,N) :-
    grafo(G, C),
    findall(Actual, (member(O-F, C), member(Actual, [O, F])), Li),
    list_to_set(Li, N),
    recorre(N).

%Función de nodos que uso en  Hamilton
nodos2(L,G) :-
setof(X,Y^vecino(G,X,Y),L).

%Función para imprimir la lista de nodos elemento, por elemento
recorre([]).
recorre([X|Xs]) :-
    write(X),write(' '),
    recorre(Xs).

%Predicado para mostrar la cantidad de nodos de un grafo
%contarNodos(nombre_Grafo, N).
%contarNodos(australia, N).
contarNodos(G,N) :-
    grafo(G, C),
    findall(Actual, (member(O-F, C), member(Actual, [O, F])), Li),
    list_to_set(Li, N),
    length(N, NumNodos),
    write('La cantidad de nodos en el grafo es = '),
    writeln(NumNodos).

%Bagof: Devuelve lista con valores consultados
%Setof: Devuelve lista con valores consultados y hace sort

%Recorrido en un grafo
%recorrido(nombre_Grafo, Origen, Destino, Camino).
%recorrido(australia, ao, ng, Camino).
recorrido(G,O,D,Cr) :-
    auxiliar(G,O,[D],Cr).

%Predicado auxiliar del rcorrido (recursiva).
auxiliar(_,O,[O|C1],[O|C1]).
auxiliar(G,Ox,[Dx|Cx],Cr) :-
    vecino(G,Ot,Dx),
    not(member(Ot, [Dx|Cx])),
    auxiliar(G,Ox,[Ot,Dx|Cx],Cr).

%Encontrar todos los caminos hamiltonianos en un grafo
%hamiltoniano(Camino_Hamiltoniano).
hamiltoniano(C) :-
recorrido(australia2,_,_,C),
nodos2(L,australia2),
length(L,N),
length(C,N).

% Encontrar todos los caminos hamiltonianos a partir de un nodo
% especificado por el usuario.
% hamiltoniano2(nodo_Inicial, Camino_Hamiltoniano).
% hamiltoniano2(tn, Camino_Hamiltoniano).
hamiltoniano2(Ni,C) :-
recorrido(australia2,Ni,_,C),
nodos2(L,australia2),
length(L,N),
length(C,N).

%Por Punto extra
%Encontrar camino más corto
%masCorto(nombre_Grafo, Origen, Destino, Camino_Mas_Corto).
%masCorto(australia, ao, ng, Camino_Mas_Corto).
masCorto(G, O, D, Cr) :-
    bestFirst([[O]], D, Cr, G).

%Usa el algortimo Best First para encontrar el camino más corto.
bestFirst([[D|Ca]|_], D, [D|Ca], _) :- !.
bestFirst([[A|Ca]|Cp], D, Cr, G) :-
    findall([X,A|Ca], (vecino(G, A, X), \+ member(X, [A|Ca])), Nc),
    append(Cp, Nc, C1),
    bestFirst(C1, D, Cr, G).





















