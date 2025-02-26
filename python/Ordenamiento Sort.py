"""
    ISAAC GALLO
    CHAC
    27 - Febrero - 2024
"""

"""
Implementación del algoritmo de ordenamiento por selección.

Este algoritmo ordena un arreglo encontrando repetidamente el elemento mínimo
de la parte no ordenada y colocándolo al principio.
"""

def ordenamiento_seleccion(arreglo):
    """
    Ordena un arreglo utilizando el algoritmo de ordenamiento por selección.

    Parámetros:
    arreglo (list): Lista de elementos a ordenar. Debe contener elementos comparables.

    Retorna:
    list: Arreglo ordenado en orden ascendente.
    """
    n = len(arreglo)
    for i in range(n):
        # Suponemos que el primer elemento no ordenado es el mínimo
        minimo = i
        # Buscar el elemento mínimo en la parte no ordenada del arreglo
        for j in range(i + 1, n):
            if arreglo[j] < arreglo[minimo]:
                minimo = j
        # Intercambiar el elemento mínimo con el primer elemento no ordenado
        arreglo[i], arreglo[minimo] = arreglo[minimo], arreglo[i]
    return arreglo

if __name__ == "__main__":
    arreglo = [64, 25, 12, 22, 11]
    print("Arreglo original:", arreglo)
    arreglo_ordenado = ordenamiento_seleccion(arreglo)
    print("Arreglo ordenado:", arreglo_ordenado)