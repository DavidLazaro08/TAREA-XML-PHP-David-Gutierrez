# TAREA: Lista de Tareas con PHP y XML

Este proyecto es una lista de tareas simple hecha en PHP con persistencia en un archivo XML.

## ¿Qué hace?

- Muestra las tareas ya existentes (si el XML está bien formado).
- Permite añadir nuevas tareas mediante un formulario.
- Las nuevas tareas se guardan directamente en el archivo `tareas.xml`, sin perderse al recargar.
- El archivo `tareas.xml` se actualiza automáticamente con cada nueva tarea.

## Archivos incluidos

- `proyecto.php`: Código principal de la aplicación.
- `tareas.xml`: Archivo XML que guarda todas las tareas.

## Cómo usarlo

1. Abre `proyecto.php` desde tu servidor local (ej: `localhost`).
2. Escribe una tarea y pulsa “Agregar”.
3. Se mostrará en la lista y quedará guardada en `tareas.xml`.

---

⚠️ Si el archivo `tareas.xml` no existe o está mal formado, se mostrará un mensaje de error.
