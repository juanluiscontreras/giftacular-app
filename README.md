# Giftacular App

This is the Giftacular application, which integrates with the Giphy API to perform various tasks such as searching for GIFs, saving favorites, and more.

## Getting Started

To get started with the Giftacular app, follow these steps:

1. **Clone the repository**:

    ```git clone https://github.com/juanluiscontreras/giftacular-app.git```

2. **Navigate to the project directory**:

    ```cd giftacular```

3. **Start Docker containers**:

    ```docker-compose up -d```

4. **Run migrations**:

    ```docker-compose exec app php artisan migrate```

5. **Import Postman Collection and Environment**:
- Import the Postman collection file `giftacular.postman_collection.json` and the environment file `giftacular.postman_environment.json` located in the `Postman` folder into your Postman application.

6. **Login in Postman**:
- Use the provided example data to login in Postman first. Once logged in, the token will be automatically set for subsequent requests.


## Diagrams

### Diagramas de Caso de Uso

- [Caso de Uso - Login](login_use_case.md)
- [Caso de Uso - Buscar GIFs](search_gifs_use_case.md)
- [Caso de Uso - Buscar GIF por ID](search_gif_by_id_use_case.md)
- [Caso de Uso - Guardar GIF Favorito](save_favorite_gif_use_case.md)

### Diagramas de Secuencia

- [Diagrama de Secuencia - Login](login_sequence.md)
- [Diagrama de Secuencia - Buscar GIFs](search_gifs_sequence.md)
- [Diagrama de Secuencia - Buscar GIF por ID](search_gif_by_id_sequence.md)
- [Diagrama de Secuencia - Guardar GIF Favorito](save_favorite_gif_sequence.md)

### Diagrama de Entidad-Relación (DER)

- [Diagrama de Entidad-Relación (DER)](entity_relation_diagram.md)

## Contributing

Contributions are welcome! If you'd like to contribute to the Giftacular app, please fork the repository and submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
