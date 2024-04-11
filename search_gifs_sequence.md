```mermaid
sequenceDiagram
    participant User
    participant Controller
    participant GiphyAPI
    User->>Controller: Envía frase de búsqueda, límite y desplazamiento opcionales
    Controller->>GiphyAPI: Realiza solicitud de búsqueda
    GiphyAPI-->>Controller: Devuelve resultados de búsqueda
    Controller-->>User: Devuelve resultados