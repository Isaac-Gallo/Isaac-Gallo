%Sexos
hombre(isaac).
mujer(felicitas).
mujer(chila).
hombre(toño).
hombre(chepito).
mujer(lupita).
mujer(chea).
mujer(josefina).
hombre(martin).
mujer(eva).
hombre(evaristo).
mujer(emilia).
hombre(jesus).
hombre(lupe).
mujer(cecilia).
hombre(juanmanuel).
mujer(carmen).
mujer(martha).
hombre(enrique).
mujer(belem).
hombre(lupillo).
mujer(mariaelia).
mujer(hector).
hombre(tony).
mujer(alma).
hombre(israel).
hombre(chac).
hombre(fabricio).
mujer(noviadefabricio).
hombre(christopher).
mujer(georgina).
mujer(luzdayana).
hombre(kike).
mujer(mariajose).
mujer(yamileth).
hombre(ernesto).
mujer(kamila).
mujer(alondra).
hombre(jacob).
mujer(laila).
hombre(juanmanuelito).

%Progenitores
progenitor(isaac, chepito).
progenitor(isaac, lupita).
progenitor(isaac, chea).
progenitor(isaac, josefina).
progenitor(felicitas, chepito).
progenitor(felicitas, lupita).
progenitor(felicitas, chea).
progenitor(felicitas, josefina).
progenitor(chila, martin).
progenitor(chila, eva).
progenitor(chila, evaristo).
progenitor(chila, emilia).
progenitor(chila, jesus).
progenitor(chila, lupe).
progenitor(toño, martin).
progenitor(toño, eva).
progenitor(toño, evaristo).
progenitor(toño, emilia).
progenitor(toño, jesus).
progenitor(toño, lupe).
progenitor(toño, lupe).
progenitor(josefina, cecilia).
progenitor(josefina, juanmanuel).
progenitor(josefina, martha).
progenitor(josefina, belem).
progenitor(josefina, mariaelia).
progenitor(josefina, tony).
progenitor(josefina, israel).
progenitor(martin, cecilia).
progenitor(martin, juanmanuel).
progenitor(martin, martha).
progenitor(martin, belem).
progenitor(martin, mariaelia).
progenitor(martin, tony).
progenitor(martin, israel).
progenitor(cecilia, chac).
progenitor(juanmanuel, fabricio).
progenitor(juanmanuel, christopher).
progenitor(juanmanuel, georgina).
progenitor(carmen, fabricio).
progenitor(carmen, christopher).
progenitor(carmen, georgina).
progenitor(martha, luzdayana).
progenitor(martha, kike).
progenitor(martha, mariajose).
progenitor(enrique, luzdayana).
progenitor(enrique, kike).
progenitor(enrique, mariajose).
progenitor(belem, yamileth).
progenitor(belem, ernesto).
progenitor(lupillo, yamileth).
progenitor(lupillo, ernesto).
progenitor(mariaelia, kamila).
progenitor(hector, kamila).
progenitor(tony, alondra).
progenitor(tony, jacob).
progenitor(alma, alondra).
progenitor(alma, jacob).
progenitor(fabricio, laila).
progenitor(fabricio, juanmanuelito).
progenitor(noviadefabricio, laila).
progenitor(noviadefabricio, juanmanuelito).

%Reglas - Relaciones familiares

%Padres
padre(P,H) :- progenitor(P,H), hombre(P).
madre(M,H) :- progenitor(M,H), mujer(M).

%Hermanos
hermano(H1,H2) :- progenitor(P,H1), progenitor(P,H2), H1\=H2.

%abuelos
abuelo(A,N) :- padre(A,P), progenitor(P,N).
abuela(A,N) :- madre(A,M), progenitor(M,N).
abuelo_pat(A,N) :- padre(A,P), padre(P,N).
abuelo_mat(A,N) :- padre(A,M), madre(M,N).
abueloGen(A,N) :- progenitor(A,P), progenitor(P,N).

%Bisabuelos
bisabuelo(B,N) :- padre(B,A), (abuelo(A,N);abuela(A,N)).
bisabuela(B,N) :- madre(B,A), (abuela(A,N);abuelo(A,N)).

%Tios abuelos
tioAbuelo(T,S) :- hombre(T), hermano(T,A),(abuelo(A,S);abuela(A,S)).
tiaAbuela(T,S) :- mujer(T), hermano(T,A), (abuelo(A,S);abuela(A,S)).

%Tios
tio(T,S) :- hombre(T), hermano(T,P), progenitor(P,S).
tia(T,S) :- mujer(T), hermano(T,P), progenitor(P,S).

%pareja
pareja(Fs,Pa) :- progenitor(Fs,H), progenitor(Pa,H), Fs\=Pa.

%Tios Politicos
tio_politico(Tp,S) :- hombre(Tp), pareja(Tp,T), (tio(T,S);tia(T,S)).
tia_politica(Tp,S) :- mujer(Tp), pareja(Tp,T), (tio(T,S);tia(T,S)).

%hijos
hijo(H,P) :- progenitor(P,H).

%Primos
primo(P1,P2) :- hijo(P1, T), (tio(T,P2);tia(T,P2)).


