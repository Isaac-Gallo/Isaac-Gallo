"""
    ISAAC GALLO
    CHAC
    07 - Mayo - 2024
"""

"""
Implementación de un algoritmo de divide y vencerás para encontrar el máximo en una lista.

Este algoritmo divide recursivamente la lista en dos mitades, encuentra el máximo en cada mitad
y luego combina los resultados para obtener el máximo global.
"""

def divide_y_venceras(lista):
    """
    Encuentra el máximo valor en una lista utilizando el enfoque de divide y vencerás.

    Parámetros:
    lista (list): Lista de números de la cual se desea encontrar el máximo.

    Retorna:
    int: El valor máximo en la lista.
    """
    if len(lista) == 1:
        # Caso base: si la lista tiene un solo elemento, ese es el máximo
        return lista[0]
    else:
        # Dividir la lista en dos mitades
        mitad = len(lista) // 2
        # Llamada recursiva para encontrar el máximo en la mitad izquierda
        izquierda = divide_y_venceras(lista[:mitad])
        # Llamada recursiva para encontrar el máximo en la mitad derecha
        derecha = divide_y_venceras(lista[mitad:])
        # Combinar los resultados: retornar el máximo entre ambas mitades
        return max(izquierda, derecha)

if __name__ == "__main__":
    lista = [3, 8, 1, 10, 5, 2]
    maximo = divide_y_venceras(lista)
    print("El máximo es:", maximo)