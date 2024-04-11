```mermaid
usecase BuscarGIFs {
    title: Buscar GIFs
    actor Usuario
    Usuario --> (Enviar Frase de Búsqueda, Límite y Desplazamiento Opcionales)
    (Enviar Frase de Búsqueda, Límite y Desplazamiento Opcionales) --> (Validar Parámetros)
    (Validar Parámetros) --> (Realizar Búsqueda en API de Giphy)
    (Realizar Búsqueda en API de Giphy) --> (Devolver Resultados)
    (Devolver Resultados) --> Usuario
}