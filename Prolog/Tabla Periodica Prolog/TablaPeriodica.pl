:-dynamic elementos/2.
:- initialization(menu).

menu :-
    consult('TablaPeriodica.BC.pl'),
    repeat,
    write('Bienvenid@, Seleccione una opci�n:'), nl,
    write('1. Mostrar Todo'), nl,
    write('2. Agregar'), nl,
    write('3. Buscar por Elemento'), nl,
    write('4. Buscar por N�mero At�mico'), nl,
    write('5. Eliminar Elemento'), nl,
    write('6. Modificar Elemento'), nl,
    write('7. Salir'), nl,
    read(O),
    (
        O = 1, opcion_1;
        O = 2, opcion_2;
        O = 3, opcion_3;
        O = 4, opcion_4;
        O = 5, opcion_5;
        O = 6, opcion_6;
        O = 7, !, write('Saliendo del programa...'), nl
    ),
    O = 7.

opcion_1 :-
    write('Mostrando elementos conocidos. . .'), nl,
    mostrarTodo,
    menu().

opcion_2 :-
    write('Para agregar un nuevo elemento escriba'), nl,
    write('el nombre del elemento en min�sculas, luego de un ENTER.'), nl,
    write('despues agrege su n�mero at�mico y de ENTER por �ltima vez.'), nl,
    write('EJEMPLO: helio.(ENTER) 1.(ENTER)'), nl,
    read(E),read(N),
    agregar(E,N),
    menu().

opcion_3 :-
    write('Escriba el nombre del elemento que desea'), nl,
    write('encontrar en min�sculas y termine con un punto'), nl,
    write('EJEMPLO: helio.'), nl,
    read(E), buscaE(E).

opcion_4 :-
    write('Escriba el N�mero At�mico del elemento que'), nl,
    write('desea encontrar y termine con un punto'), nl,
    write('EJEMPLOS: 1.  |   22.  |   10.'), nl,
    read(N), buscarN(N).

opcion_5 :-
    write('Para eliminar un elemento escriba el'), nl,
    write('nombre del elemento en min�sculas y termine'), nl,
    write('con un punto'), nl,
    write('EJEMPLO: helio.'), nl,
    read(E), eliminar(E),
    menu().

opcion_6 :-
    write('Para EDITAR un elemento escriba el nombre del elemento en'), nl,
    write('min�sculas, finalice con un punto y luego de un ENTER. Despu�s'), nl,
    writeln("escriba el n�mero at�mico del elemento que desea editar y d� un ENTER."),
    write('EJEMPLO: helio.(ENTER) 1.(ENTER)'), nl,
    read(E),read(N),
    editar(E,N).

mostrarTodo :- listing(elementos/2).

agregar(E,N):- asserta(elementos(E,N)),
    guardar,
    write('Nuevo Elemento Agregado con �xito!!'), nl,nl.

buscaE(E):-elementos(E,Nd),
    write("Elemento = "), write(E),nl, write("No. At�mico = "),
    write(Nd),nl,nl,
    menu().

buscaE(E):- \+elementos(E,Nd),
    menu2().

buscarN(N):-elementos(Ed,N),
    write("No. At�mico = "), write(N), nl, write("Elemento = "),
    write(Ed),nl,
    menu().

buscarN(N):- \+elementos(Ed,N),nl,
    menu2().

eliminar(E):-elementos(E,N),
    retract(elementos(E,N)),
    guardar,
    write('Elemento eliminado con �xito...'), nl,nl.

eliminar(E):- \+elementos(E,N),
    write('Elemento no encontrado. . .'),nl,nl.

editar(E,N):- elementos(E,N),
    retract(elementos(E,N)),nl,
    editando,
    menu().

editar(E,N):- \+elementos(E,N),nl,nl,
    menu2().

editando:-
    writeln("Por favor ingrese los nuevos datos"),
    write('Escriba el nombre del elemento en minusculas'), nl,
    write('y de un ENTER. Despu�s escriba el n�mero at�mico,'), nl,
    write('termine con un punto y de un ultimo ENTER'), nl,
    write('EJEMPLO: helio.(ENTER) 1.(ENTER)'), nl,
    read(E),read(N),
    asserta(elementos(E,N)),
    guardar,
    writeln("El Elemento se Edit� con �xito!!"),nl.

guardar :- tell('TablaPeriodica.BC.pl'),
listing(elementos/2),
told.

menu2 :-
    repeat,
    writeln(""),
    write('El elemento no existe �Desea Agregarlo?'), nl,
    write('1. SI'), nl,
    write('2. NO'), nl,
    read(D),
    (
        D = 1, opcion_2();
        D = 2, menu(), nl
    ).
