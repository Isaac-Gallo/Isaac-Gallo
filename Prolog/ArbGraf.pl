arboln(nombre, arbol(a, arbol(e,f,arbol(n,r,'')),arbol(d,n,o))).

arboln(ejemplo, arbol(r,i,d)).

recorrer(NA, ino) :- arboln(NA, A), ino(A),!.

ino(arbol(Raiz,Hizq, Hder)):-
    ino(Hizq), write(Raiz),
    ino(Hder),!.
ino(H) :- write(H).

%arbol como lista:
arboll(nom,[raiz,[Hder],[Hizq]]).

%preorden

pre(arbol, (Raiz, Izq, Der)):-
    write(Raiz),
    pre(Izq), pre(Der), !.

pre(H):- write(H).

%Grafos con listas

grafo(australia, [AO-TN, AO-AS, TN-AS, TN-Q,AS-Q,AS-V,AS-NG,Q-NG,NG-V,T-T]).

grafox(gnn, [a-i,a-b,a-d,b-c,b-e,d-e,d-i,e-f,f-m]).

%Buscar Vecinos

vecino(N1,N2,G) :-
    grafo(G,La),
    member(N1-N2, La);member(N2-N1,La).

vecinoN(N,G):-
    grafo(G,La).


%Bagof: Devuelve lista con valores consultados
%Setof: Devuelve lista con valores consultados y hace sort

nodos(G,Ln):-bagof(N1,N2^vecino(N1,N2,G),Ln).

recorrido(G,O,D,Cr) :-
    auxiliar(G,O,[D],Cr).

auxiliar(_,O,[O|C1],[O|C1]).
auxiliar(G,Ox,[Dx|Cx],Cr) :-
    vecino(Ot,Dx,G),
    not(member(Ot, [Dx|Cx])),
    auxilia(G,Ox,[Ot,Dx|Cx],Cr).
