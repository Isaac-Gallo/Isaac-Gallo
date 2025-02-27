:-dynamic listas/2.

% Isaac Gallo - 221978566
% Javier Guill�n Dom�nguez - 218828421
% Milton Mej�a Medina - 218655373
% Jos� Luis Navarrete Jim�nez - 213575622
% Jos� Luis Zavala Arevalo - 218574489


menu :-
    consult('listas.BC.pl'),
    repeat,
    write('Bienvenid@, Seleccione una opci�n:'), nl,
    write('1. Buscar'), nl,
    write('2. Comprobar'), nl,
    write('3. Concatenar'), nl,
    write('4. Agregar'), nl,
    write('5. Eliminar'), nl,
    write('6. Longitud'), nl,
    write('7. Ordenar'), nl,
    write('8. Salir'),nl,
    read(O),
    (
        O = 1, opcion_1;
        O = 2, opcion_2;
        O = 3, opcion_3;
        O = 4, opcion_4;
        O = 5, opcion_5;
        O = 6, opcion_6;
        O = 7, opcion_7;
        O = 8, !, write('Saliendo del programa...'), nl
    ),
    O = 8.

opcion_1:-
    writeln('Escriba el nombre de la lista, termine con un punto y de un enter, despu�s ponga'),
    writeln('el nombre del elemento a buscar y termine con un punto y d� un ultimo enter'),
    writeln('EJEMPLO: lista.(ENTER), elemento(ENTER)'),
    read(L), read(E),
    buscarLista(L,E),
    menu().

opcion_2:-
    writeln('Para listar escriba el nombre de la lista y ver� todos los elementos de esta'),
    writeln('termine con un punto y de ENTER. EJEMPLO (lista.(ENTER))'),
    read(L),
    mostrarLista(L),nl,
    menu().

opcion_3:-
    writeln('Para concatenar escria el nombre de la priemra lista terminecon un punto y precione (ENTER)'),
    writeln('despues escriba el nombre de la seguna lista, termine con un punto y de ENTER. EJEMPLO (lista.(ENTER))'),
    read(L1), read(L2),
    concatenar2(L1,L2),
    menu().

opcion_4:-
    writeln('Escriba el nombre del elemento que desea agregar, despues ponga punto y d� ENTER,'),
    writeln('despues escriba el nombre de la lista, termine con un punto y de ENTER'),
    writeln('EJEMPLO: elemento.(ENTER) lista.(Enter)'),
    read(E), read(L),
    agregarElemento(L,E),
    guardar,
    menu().

opcion_5:-
    writeln('Escriba el nombre del elemento qe desea eliminar, termine con un punto y de ENTER'),
    writeln('Escriba el nombre de la lista en la que buscar� y de ENTER'),
    writeln('EJEMPLO: elemento.(ENTER)   lista.(ENTER)'),
    read(E), read(L),
    elementoList(L,E),
    guardar,
    menu().

opcion_6:-
    writeln('Escriba el nombre de la lista que desea buscar y termine con un punto, luego de un ENTER'),
    read(L),
    longLista(L, Long),
    write('La longitud es = '), writeln(Long),
    menu().

opcion_7:-
    ordenar,
    menu().


buscarLista(L, E):-
    listas(L, Li),
    (buscar(E,Li) ->writeln('Elemento encontrado'),
      write('ELEMENTO = '), writeln(E);
    writeln('Elemento no ncontrado'),menu2()),nl.

buscar(E,[E|_]):- write(E).
buscar(E, [_|T]):- buscar(E,T).

mostrarLista(L) :-
    listas(L, E),
    write('Elementos de la lista '), write(L), write(':'), nl,
    mostrar(E).

mostrar([]).
mostrar([H|T]) :-
    write(H), nl,
    mostrar(T).

concatenar2(L1, L2) :-
    listas(L1, Li),
    listas(L2, Li2),
    concatenar(Li, Li2, Nl),
    retract(listas(L1, Li)),
    retract(listas(L2, Li2)),
    asserta(listas(L1, Nl)),
    write('La Lista Concatenada es = '), writeln(Nl).

concatenar([], L, L).
concatenar([X|R1], L2, [X|R2]) :-
    concatenar(R1, L2, R2).


agregarElemento(L, E) :-
    listas(L, La),
    agregar(La, E, Nl),
    retract(listas(L, La)),
    asserta(listas(L, Nl)),
    writeln(Nl).

agregar(L, E, [E|L]).


elementoList(L, E) :-
    writeln('voy a buscar listas'),
    listas(L, La),
    writeln('Lista encontrada:'), writeln(La),
    writeln('voy a entrar a eliminar'),
    eliminar(La, E, Nl),
    writeln('Elemento eliminado, nueva lista:'), writeln(Nl),
    retract(listas(L, _)),
    asserta(listas(L, Nl)),
    writeln('Lista actualizada con �xito!').

eliminar([], _, []).
eliminar([H|T], H, Nl) :-
    writeln('Eliminando elemento...'), writeln(H),
    eliminar(T, H, Nl).
eliminar([H|T], E, [H|Nl]) :-
    eliminar(T, E, Nl).


longLista(L, Long) :-
    listas(L, Li),
    longitud(Li, Long).

longitud([], 0).
longitud([_|T], Long) :-
    longitud(T, Cont),
    Long is Cont + 1.

ordenar:-
    write('Ingresa el nombre de la lista a ordenar: '),
    read(N),
    listas(N, Li),
    sort(Li, NLi),
    write('Su manera ordenada es: '),
    write(NLi), nl.

guardar:-
    tell('listas.BC.pl'),
    listing(listas/2),
    told.


menu2 :-
    repeat,
    writeln(""),
    write('El elemento no existe �Desea Agregarlo?'), nl,
    write('1. SI'), nl,
    write('2. NO'), nl,
    read(D),
    (
        D = 1, opcion_4();
        D = 2, menu(), nl
    ).
