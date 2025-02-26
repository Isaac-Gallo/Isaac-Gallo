"""
    ISAAC GALLO
    CHAC
    07 - Mayo - 2024

"""
"""
Implementación de un algoritmo voraz para problemas de optimización.

Esta sección demuestra un patrón básico de algoritmo voraz que 
selecciona iterativamente los elementos más prometedores.
En esta implementación de ejemplo, se utiliza para ordenar
una lista numérica en orden ascendente.
"""

def algoritmo_voraz(entrada):
    """
    Armar la mejor solución posible eligiendo en cada momento lo 
    que parece más conveniente

    Parámetros:
    entrada (list): Lista de elementos a procesar. Debe contener elementos comparables

    Retorna:
    list: Solución construida mediante selecciones voraces
    """
    solucion = []
    while entrada:
        elemento = seleccionar_mejor_elemento(entrada)
        solucion.append(elemento)
        entrada.remove(elemento)
    return solucion

def seleccionar_mejor_elemento(entrada):
    """
    Función de selección voraz: criterio de optimalidad local.
    En esta implementación específica, selecciona el elemento mínimo.

    Parámetros:
    entrada (list): Lista de elementos disponibles para selección

    Retorna:
    object: Elemento seleccionado según el criterio voraz
    """
    return min(entrada)

# Caso de uso demostrativo
if __name__ == "__main__":
    datos_entrada = [3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5]
    resultado = algoritmo_voraz(datos_entrada.copy())
    print(f"Entrada original: {datos_entrada}")
    print(f"Resultado ordenado: {resultado}")