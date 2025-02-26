"""
    ISAAC GALLO
    CHAC
    03 - Octubre - 2024
"""

"""
Implementación del algoritmo de Dijkstra para encontrar las rutas más cortas en un grafo.

Este programa utiliza una matriz de adyacencia para representar un grafo y calcula
las distancias mínimas desde un nodo inicial a todos los demás nodos utilizando
el algoritmo de Dijkstra.
"""

import heapq
import matplotlib.pyplot as plt
import networkx as nx
import numpy as np

def dijkstra(grafox, inicial):
    """
    Implementa el algoritmo de Dijkstra para encontrar las distancias mínimas desde un nodo inicial.

    Parámetros:
    grafox (list): Matriz de adyacencia que representa el grafo.
    inicial (int): Nodo inicial desde el cual se calcularán las distancias.

    Retorna:
    dict: Diccionario con las distancias mínimas desde el nodo inicial a todos los demás nodos.
    """
    n = len(grafox)
    # Inicializar distancias con infinito, excepto el nodo inicial
    distancias = {node: float('inf') for node in range(n)}
    distancias[inicial] = 0

    # Cola de prioridad para almacenar nodos por visitar
    priodidad_cola = [(0, inicial)]  # (distancia, nodo)

    while priodidad_cola:
        # Extraer el nodo con la menor distancia
        distancia_actual, nodo_actual = heapq.heappop(priodidad_cola)

        # Si la distancia extraída es mayor que la almacenada, ignorar el nodo
        if distancia_actual > distancias[nodo_actual]:
            continue

        # Explorar los nodos vecinos
        for vecino in range(n):
            if grafox[nodo_actual][vecino] != float('inf'):
                dist = distancia_actual + grafox[nodo_actual][vecino]

                # Si se encuentra una distancia menor, actualizarla y agregar el nodo a la cola
                if dist < distancias[vecino]:
                    distancias[vecino] = dist
                    heapq.heappush(priodidad_cola, (dist, vecino))

    return distancias

def mostrar_matriz_grafico(matriz, titulo):
    """
    Muestra la matriz de adyacencia en forma de tabla gráfica.

    Parámetros:
    matriz (list): Matriz de adyacencia a mostrar.
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
    print("Bienvenido al programa del algoritmo de Dijkstra.")
    print("Este programa calcula las distancias mínimas desde un nodo inicial a todos los nodos en un grafo.")

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
    mostrar_matriz_grafico(grafo, "Matriz del Grafo")

    # Escoger nodo de inicio
    seleccion = int(input("Introduce el nodo de inicio (SELECCIONE UN NUMERO DEL 1 AL 7): "))
    nodo_inicio = seleccion - 1

    print(f"\nCalculando las rutas óptimas desde el nodo {nodo_inicio + 1} utilizando el algoritmo de Dijkstra...")

    # Ejecutar el algoritmo de Dijkstra
    rutas_optimas = dijkstra(grafo, nodo_inicio)

    # Mostrar los resultados
    print(f"\nDistancias mínimas desde el nodo {seleccion}:")
    print()
    for nodo, distancia in rutas_optimas.items():
        print(f"Distancia al nodo {nodo + 1}: {distancia}")
        print()

    plt.show()

if __name__ == "__main__":
    main()