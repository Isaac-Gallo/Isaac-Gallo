"""
    ISAAC GALLO
    CHAC
    26 - Noviembre - 2024
"""

"""
Implementación de un flujo de trabajo completo para clasificación utilizando Random Forest.

Este script incluye la carga de datos, preprocesamiento, entrenamiento de un modelo de Random Forest,
optimización de hiperparámetros, evaluación del modelo y visualización de resultados.
"""

import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns
from sklearn.datasets import load_iris
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import classification_report, accuracy_score, confusion_matrix
from sklearn.model_selection import GridSearchCV, learning_curve

# Cargar el conjunto de datos Iris
data = load_iris()
df = pd.DataFrame(data.data, columns=data.feature_names)
df['species'] = data.target
df['species'] = df['species'].map({0: 'setosa', 1: 'versicolor', 2: 'virginica'})

# Visualización del conjunto de datos
print("Primeras filas del conjunto de datos:")
print(df.head())

# Preprocesamiento de datos
# Normalización de los datos
scaler = StandardScaler()
X = df.drop(columns=['species'])
X_scaled = scaler.fit_transform(X)

# Codificación de la variable de salida (ya es categórica)
y = df['species']

# División del conjunto de datos en entrenamiento (80%) y prueba (20%)
X_train, X_test, y_train, y_test = train_test_split(X_scaled, y, test_size=0.2, random_state=42)

# Entrenamiento del modelo Random Forest
rf = RandomForestClassifier(random_state=42)  # Aplicación del algoritmo
rf.fit(X_train, y_train)

# Evaluación del modelo
y_pred = rf.predict(X_test)
accuracy = accuracy_score(y_test, y_pred)
print(f"Exactitud del modelo: {accuracy:.4f}")
print("\nReporte de clasificación:\n", classification_report(y_test, y_pred))

# Optimización del modelo utilizando GridSearchCV
param_grid = {
    'n_estimators': [50, 100, 150],  # Número de árboles en el bosque
    'max_depth': [None, 10, 20, 30],  # Profundidad máxima de los árboles
    'min_samples_split': [2, 5, 10],  # Número mínimo de muestras requeridas para dividir un nodo
    'min_samples_leaf': [1, 2, 4]     # Número mínimo de muestras que debe tener una hoja
}

grid_search = GridSearchCV(estimator=rf, param_grid=param_grid, cv=5, verbose=2, n_jobs=-1)  # Aplicación del GridSearch
grid_search.fit(X_train, y_train)

# Mostrar los mejores parámetros encontrados por GridSearchCV
print("\nMejores parámetros encontrados por GridSearchCV:", grid_search.best_params_)

# Evaluación del modelo optimizado
best_rf = grid_search.best_estimator_
y_pred_best = best_rf.predict(X_test)
accuracy_best = accuracy_score(y_test, y_pred_best)
print(f"\nPrecisión después de optimización: {accuracy_best:.4f}")
print("\nReporte de clasificación con el mejor modelo:\n", classification_report(y_test, y_pred_best))

# Visualización de la importancia de las características
feature_importances = best_rf.feature_importances_
features = df.drop(columns=['species']).columns
importance_df = pd.DataFrame({'Feature': features, 'Importance': feature_importances})
importance_df = importance_df.sort_values(by='Importance', ascending=False)

# Gráfico de la importancia de las características
plt.figure(figsize=(8, 6))
sns.barplot(x='Importance', y='Feature', data=importance_df)
plt.title("Importancia de las características")
plt.show()

# Generar la matriz de confusión para el modelo original
cm = confusion_matrix(y_test, y_pred)

# Graficar la matriz de confusión
plt.figure(figsize=(6, 6))
sns.heatmap(cm, annot=True, fmt='d', cmap='Blues', xticklabels=df['species'].unique(), yticklabels=df['species'].unique())
plt.title("Matriz de Confusión - Modelo Inicial")
plt.xlabel("Predicción")
plt.ylabel("Real")
plt.show()

# Graficar la matriz de confusión para el modelo optimizado
cm_best = confusion_matrix(y_test, y_pred_best)

plt.figure(figsize=(6, 6))
sns.heatmap(cm_best, annot=True, fmt='d', cmap='Blues', xticklabels=df['species'].unique(), yticklabels=df['species'].unique())
plt.title("Matriz de Confusión - Modelo Optimizado")
plt.xlabel("Predicción")
plt.ylabel("Real")
plt.show()

# Obtener las curvas de aprendizaje
train_sizes, train_scores, test_scores = learning_curve(best_rf, X_scaled, y, cv=5, n_jobs=-1)

# Promediar las puntuaciones de entrenamiento y prueba
train_mean = np.mean(train_scores, axis=1)
test_mean = np.mean(test_scores, axis=1)

# Graficar la curva de aprendizaje
plt.figure(figsize=(8, 6))
plt.plot(train_sizes, train_mean, label='Precisión de entrenamiento', color='blue')
plt.plot(train_sizes, test_mean, label='Precisión de prueba', color='red')
plt.title('Curva de Aprendizaje')
plt.xlabel('Tamaño del conjunto de entrenamiento')
plt.ylabel('Precisión')
plt.legend()
plt.show()