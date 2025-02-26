"""
    ISAAC GALLO
    CHAC
    07 - Mayo - 2024
"""

"""
Implementación de una función para calcular el n-ésimo número de Fibonacci.

Este algoritmo utiliza un enfoque iterativo con programación dinámica
para calcular el número de Fibonacci de manera eficiente.
"""

def fibonacci(n):
    """
    Calcula un número "n" de Fibonacci utilizando un enfoque iterativo.

    Parámetros:
    n (int): Posición del número de Fibonacci que se desea calcular.

    Retorna:
    int: El n-ésimo número de Fibonacci.
    """
    if n <= 1:
        # Caso base: Fibonacci(0) = 0, Fibonacci(1) = 1
        return n
    else:
        # Inicializar una lista para almacenar los valores calculados
        fib = [0, 1]

        # Calcular los valores de Fibonacci de 2 hasta n
        for i in range(2, n + 1):
            fib.append(fib[i - 1] + fib[i - 2])

        return fib[n]

if __name__ == "__main__":
    n = 10
    resultado = fibonacci(n)
    print(f"El {n}-ésimo número de Fibonacci es:", resultado)