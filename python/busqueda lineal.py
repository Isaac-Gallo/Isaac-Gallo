"""
    ISAAC GALLO
    CHAC
    27 - Febrero - 2024
"""

"""
Implementación de la búsqueda lineal.

Este algoritmo busca un elemento objetivo en un arreglo recorriéndolo
secuencialmente desde el inicio hasta encontrar el elemento o llegar al final.
"""

def busqueda_lineal(arr, objetivo):
    """
    Busca un elemento objetivo en un arreglo utilizando el método de búsqueda lineal.

    Parámetros:
    arr (list): Lista de elementos en la que se realizará la búsqueda.
    objetivo (any): Elemento que se desea encontrar en el arreglo.

    Retorna:
    int: Índice del elemento objetivo si se encuentra, de lo contrario retorna -1.
    """
    for i in range(len(arr)):  # Recorre el arreglo desde el índice 0 hasta len(arr) - 1
        if arr[i] == objetivo:
            return i  # Retorna el índice si el elemento objetivo es encontrado
    return -1  # Retorna -1 si el elemento no se encuentra en el arreglo

if __name__ == "__main__":
    arreglo = [2, 3, 5, 7, 11, 13, 17]
    elemento = 11
    indice = busqueda_lineal(arreglo, elemento)
    if indice != -1:
        print(f"El elemento {elemento} se encuentra en el índice {indice}.")
    else:
        print(f"El elemento {elemento} no se encuentra en el arreglo.")