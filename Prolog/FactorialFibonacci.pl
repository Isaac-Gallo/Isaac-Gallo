%Isaac Gallo - 221978566
:- dynamic fib/2.
:- dynamic fac/2.

fibo(N, R) :-
    fib(N, R), !.
fibo(N, R) :-
    N > 1,
    N1 is N - 1,
    N2 is N - 2,
    fibo(N1, R1),
    fibo(N2, R2),
    R is R1 + R2,
    assertz(fib(N, R)),
    guardarFibo,
    write("Guardado! ").

fibo(0, 0).
fibo(1, 1).

factorial(N,F):-
    fac(N,F), !.
factorial(N, F) :-
    N > 0,
    Nx is N - 1,
    factorial(Nx, Fx),
    F is N * Fx,
    assertz(fac(N,F)),
    guardarFact,
    write("Guardado! ").

factorial(0,1).


guardarFibo :- tell('Fibonacci.pl'),
listing(fib/2),
told.

guardarFact :- tell('Factorial.pl'),
listing(fac/2),
told.


