"""
    ISAAC GALLO
    CHAC
    27 - Febrero - 2024
"""

"""
Implementación del algoritmo de ordenamiento de burbuja.

Este algoritmo ordena un arreglo comparando elementos adyacentes
y intercambiándolos si están en el orden incorrecto. Este proceso
se repite hasta que el arreglo esté completamente ordenado.
"""

def ordenamiento_burbuja(arreglo):
    """
    Ordena un arreglo utilizando el algoritmo de burbuja.

    Parámetros:
    arreglo (list): Lista de elementos a ordenar. Debe contener elementos comparables.

    Retorna:
    list: Arreglo ordenado en orden ascendente.
    """
    n = len(arreglo)
    for i in range(n):
        # El bucle interno recorre el arreglo, comparando elementos adyacentes
        for j in range(0, n-i-1):
            # Si el elemento actual es mayor que el siguiente, se intercambian
            if arreglo[j] > arreglo[j+1]:
                arreglo[j], arreglo[j+1] = arreglo[j+1], arreglo[j]
    return arreglo

if __name__ == "__main__":
    arreglo = [64, 34, 25, 12, 22, 11, 90]
    print("Arreglo original:", arreglo)
    arreglo_ordenado = ordenamiento_burbuja(arreglo)
    print("Arreglo ordenado:", arreglo_ordenado)
