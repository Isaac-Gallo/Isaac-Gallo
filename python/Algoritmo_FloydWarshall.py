"""
    ISAAC GALLO
    CHAC
    03 - Octubre - 2024
"""

"""
Implementación del algoritmo de Floyd-Warshall para encontrar las distancias mínimas entre todos los pares de nodos en un grafo.

Este programa calcula las distancias mínimas en una red de routers representada como una matriz de adyacencia.
Además, incluye funciones para visualizar el grafo y las matrices de adyacencia y distancias mínimas.
"""

import matplotlib.pyplot as plt
import networkx as nx
import numpy as np

def floyd_warshall(grafo):
    """
    Implementa el algoritmo de Floyd-Warshall para encontrar las distancias mínimas entre todos los pares de nodos.

    Parámetros:
    grafo (list): Matriz de adyacencia que representa el grafo.

    Retorna:
    list: Matriz de distancias mínimas entre todos los nodos.
    """
    n = len(grafo)
    # Inicializa la matriz de distancias con los valores del grafo o infinito si no hay conexión directa
    distancias = [[float('inf') if grafo[i][j] == 0 else grafo[i][j] for j in range(n)] for i in range(n)]

    # Especificamos que las distancias de cualquier nodo a sí mismo son cero
    for i in range(n):
        distancias[i][i] = 0

    # Aplica el algoritmo de Floyd-Warshall
    for k in range(n):
        for i in range(n):
            for j in range(n):
                if distancias[i][k] != float('inf') and distancias[k][j] != float('inf'):
                    distancias[i][j] = min(distancias[i][j], distancias[i][k] + distancias[k][j])

    return distancias  # Retorna la matriz con distancias mínimas

def mostrar_matriz_grafico(matriz, titulo):
    """
    Muestra una matriz en forma de tabla gráfica.

    Parámetros:
    matriz (list): Matriz a mostrar.
    titulo (str): Título del gráfico.
    """
    fig, ax = plt.subplots()
    ax.set_axis_off()

    # Crear una tabla en el gráfico
    tabla = ax.table(cellText=matriz, loc='center', cellLoc='center',
                     colLabels=np.arange(1, len(matriz) + 1),
                     rowLabels=np.arange(1, len(matriz) + 1),
                     colColours=['lightblue'] * len(matriz),
                     rowColours=['lightblue'] * len(matriz))

    tabla.auto_set_font_size(False)
    tabla.set_fontsize(10)
    tabla.scale(1.2, 1.2)

    # Establecer el título del gráfico
    ax.set_title(titulo, pad=20)

def mostrar_grafo(grafo):
    """
    Muestra el grafo de manera gráfica utilizando NetworkX.

    Parámetros:
    grafo (list): Matriz de adyacencia que representa el grafo.
    """
    G = nx.Graph()
    n = len(grafo)

    # Añadir nodos al grafo
    for i in range(n):
        G.add_node(i + 1)  # Cambiar el nombre del nodo de 0-6 a 1-7

    # Añadir aristas al grafo
    for i in range(n):
        for j in range(n):
            if grafo[i][j] != float('inf') and i != j:
                G.add_edge(i + 1, j + 1, weight=grafo[i][j])

    # Definir posiciones manuales para los nodos
    posiciones_personalizadas = {
        1: (1, 2),
        2: (1, 3.5),
        3: (2, 4),
        4: (2, 3),
        5: (2, 2),
        6: (3, 3.5),
        7: (3, 2)
    }

    # Dibujar el grafo con NetworkX
    edges = G.edges(data=True)
    weights = [d['weight'] for (u, v, d) in edges]

    plt.figure(figsize=(8, 6))
    nx.draw(G, pos=posiciones_personalizadas, with_labels=True,
            labels={i: str(i) for i in range(1, n + 1)},
            node_color='lightblue', node_size=500, font_size=10,
            font_color='darkred')
    nx.draw_networkx_edge_labels(G, pos=posiciones_personalizadas,
                                 edge_labels={(u, v): f"{d['weight']:.1f}" for (u, v, d) in edges},
                                 font_color='blue', font_size=15, label_pos=0.5, verticalalignment='bottom')
    nx.draw_networkx_edges(G, pos=posiciones_personalizadas,
                           edgelist=edges, width=2)

    plt.title("Red de Routers")

def main():
    """
    Función principal del programa.
    """
    print("Bienvenido al programa del algoritmo de Floyd-Warshall.")
    print("Este programa calcula las distancias mínimas entre todos los pares de nodos en una red de routers.")
    print("A continuación se muestra la matriz de adyacencia inicial de la red:")

    # Matriz de adyacencia del grafo (red de routers)
    grafo = [
        [0, float('inf'), 5, 5, 13, float('inf'), float('inf')],
        [float('inf'), 0, 13, 13, 13, float('inf'), float('inf')],
        [5, 13, 0, float('inf'), float('inf'), 1, 5],
        [5, 13, float('inf'), 0, float('inf'), 1, 5],
        [13, 13, float('inf'), float('inf'), 0, 5, 1],
        [float('inf'), float('inf'), 1, 1, 5, 0, 13],
        [float('inf'), float('inf'), 5, 5, 1, 13, 0]
    ]

    # Mostrar el grafo inicial
    mostrar_grafo(grafo)
    mostrar_matriz_grafico(grafo, "Matriz de Adyacencia Inicial")

    print("\nCalculando las rutas óptimas utilizando el algoritmo de Floyd-Warshall...")

    # Ejecutar el algoritmo de Floyd-Warshall
    rutas_optimas = floyd_warshall(grafo)

    print("\nMatriz de distancias mínimas entre todos los nodos:")
    mostrar_matriz_grafico(rutas_optimas, "Matriz de Distancias Mínimas")

    print("\nNota: 'INF' indica que no hay un camino directo entre los nodos correspondientes.")

    # Mostrar todas las figuras al mismo tiempo
    plt.show()

if __name__ == "__main__":
    main()