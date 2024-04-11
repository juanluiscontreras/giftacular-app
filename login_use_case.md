```mermaid
usecase Login {
    title: Iniciar Sesión
    actor Usuario
    Usuario --> (Ingresar Correo Electrónico y Contraseña)
    (Ingresar Correo Electrónico y Contraseña) --> (Validar Datos)
    (Validar Datos) --> (Generar Token de Acceso)
    (Generar Token de Acceso) --> Usuario
}
