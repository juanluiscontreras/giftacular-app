```mermaid
sequenceDiagram
    participant User
    participant Controller
    participant GiphyAPI
    User->>Controller: Envía ID del GIF
    Controller->>GiphyAPI: Realiza solicitud para obtener información del GIF
    GiphyAPI-->>Controller: Devuelve datos del GIF
    Controller-->>User: Devuelve datos del GIF