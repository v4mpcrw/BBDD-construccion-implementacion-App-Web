# Instrucciones de Uso para MoBa Tickets

### **Paso 1:** Descomprimir el archivo
### **Paso 2:** Activar el XAMPP  
### **Paso 3:** Mover la carpeta principal del proyecto a htdocs (`C:\xampp\htdocs`)
### **Paso 4:** No mover ningún archivo de su respectiva carpeta  
### **Paso 5:** Abrir pgAdmin o DBeaver y hacer restore al backup de la base de datos que estará dentro de la carpeta del proyecto
### **Paso 6:** Abrir Conexion.php que está dentro de la carpeta de php que está dentro de la carpeta HTML
### **Paso 7:** Modificar la conexión con los datos correctos para conectar la base de datos
### **Paso 8:** Abrir `Inicio.html`
---

## **Opción: Ingresar Cliente**

### **Tener en consideración**

Al momento de ingresar un cliente, utilizar los siguientes tipos de datos:

| Campo | Tipo de Dato | Ejemplo |
|-------|-------------|---------|
| **Email** | VARCHAR (Texto) | `usuario@correo.com` |
| **Nombre Completo** | VARCHAR (Texto) | `Juan Pérez González` |
| **Fecha de Nacimiento** | DATE (Fecha) | `1990-05-15` |
| **Número de Teléfono** | INTEGER (Número entero) | `912345678` |
| **Departamento** | VARCHAR (Texto) | `A-401` |
| **Condominio** | VARCHAR (Texto) | `Los Olivos` |
| **Número de Calle** | INTEGER (Número entero) | `123` |
| **Comuna** | VARCHAR (Texto) | `Providencia` |
| **Región** | VARCHAR (Texto) | `Metropolitana` |
| **Sexo** | TEXT (Texto) | `Masculino`/`Femenino` |
| **Contraseña** | VARCHAR (Texto) | `********` |

---

## **Importante - Validaciones de Datos de Cliente**

### **Formatos Específicos:**
- **Email:** Debe contener `@` y un dominio válido
- **Fecha:** Formato `YYYY-MM-DD` (Año-Mes-Día)
- **Teléfono:** Solo números, sin espacios ni símbolos
- **Números:** Solo valores numéricos enteros

---

## **Opción: Ingresar Nuevo Evento**

### **Tener en cuenta lo siguiente**

Al momento de rellenar los datos de Evento como de Función

### **Tabla: evento**
| Campo | Tipo de Dato | 
|-------|-------------|
| `id_evento` | integer |
| `nombre_evento` | character varying |
| `productor` | character varying | 
| `rut_productor` | integer |
| `tipo_evento` | text |
| `hora` | integer | 
| `dia` | integer | 
| `mes` | integer | 
| `anio` | integer | 

### **Tabla: funcion**
| Campo | Tipo de Dato |
|-------|-------------|
| `id_funcion` | integer |
| `id_evento` | integer |
| `hora` | integer |
| `dia` | integer |
| `mes` | integer |
| `anio` | integer |
| `capacidad` | integer |

### **Tabla: lugar**
| Campo | Tipo de Dato |
|-------|-------------|
| `nombre_lugar` | character varying |
| `precio` | real |
| `sector` | character varying |

---

## **Tablas de Tipos de Evento**

### **Tabla: deporte**
| Campo | Tipo de Dato |
|-------|-------------|
| `club_deportivo` | character varying |
| `nombre_equipo` | character varying |
| `tipo_deporte` | character varying |
| `id_evento` | integer |

### **Tabla: teatro**
| Campo | Tipo de Dato |
|-------|-------------|
| `descripcion` | text |
| `elenco` | integer |
| `duracion` | time without time zone |
| `publico` | text |
| `id_evento` | integer |

### **Tabla: musica**
| Campo | Tipo de Dato |
|-------|-------------|
| `genero_musical` | character varying |
| `nombre_artistico` | character varying |
| `setlist` | character varying |
| `id_evento` | integer |

### **Tabla: familia**
| Campo | Tipo de Dato |
|-------|-------------|
| `tipo_familia` | text |
| `id_evento` | integer |   

### **Tabla: especial**
| Campo | Tipo de Dato |
|-------|-------------|
| `tipo_especial` | text |
| `id_evento` | integer |

---

## **Opción: Actualizar Cliente**

### **Tener en consideración que este apartado recibe los mismos datos que en la opción de ingresar cliente, SIN CAMBIAR EL EMAIL ya que es la clave primaria**

---

## **Opción: Eliminar Cliente**

### **Tener en consideración las siguientes cosas**
- **Email:** Debe contener `@` y un dominio válido
- **El email debe ser parte de la base de datos, sino este mandará una pantalla de error que dará opción para redirigirse al inicio**

---

## **Opción: Consultar Evento/Funciones/Tickets**
- **Elegir entre estas 3 opciones**

### **Opción: Consultar Evento**
- **Ingresar el nombre del evento el cual estamos buscando**

### **Opción: Consultar Funciones**
- **Ingresar el ID de la función el cual estamos buscando**

### **Opción: Consultar Tickets**
Hay dos opciones para consultar por el ticket: 
- **1. Elegir entre las opciones de sectores que hay para consultar por el ticket**
- **2. Ingresar el ID del ticket que estamos buscando**
- **3. Elegir el ticket por el tipo de descuento**


---

## Extras:
MR plataforma Diagram: https://dbdiagram.io/d/MR-PROMOCION-Y-VENTA-DE-ENTRADAS-6928c989a0c4ebcc2b0efdaa 

#### Bárbara González - María Belén González - Paola Parra - Monserrat Valderrama
