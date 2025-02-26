import tkinter as tk
from tkinter import PhotoImage
from PIL import Image, ImageTk

class Akinator:
    # Árbol de decisiones
    def __init__(self):
        self.tree = {
            "question": "¿Tu personaje es EL MÁS FUERTE?",
            "yes": {
                "answer": "EL ÚNICO QUE MERECE BENERACIÓN EN EL CIELO Y EN LA TIERRA, HEREDERO DE LOS 6 OJOS DEL CLAN GOJO, USUARIO DE LA TÉCNICA MALDITA DEL INFINTO. EL MÁS FUERTE. SATORU GOJO",
                "image": "gojo.png"
            },
            "no": {
                "question": "¿Es una Maldición?",
                "yes": {
                    "question": "¿Necesita chambelanes para pelear contra el más fuerte?",
                    "yes": {
                        "answer": "Ryomen Guionkuna",
                        "image": "sukuna.png"
                    },
                    "no": {
                        "question": "¿Tiene hermano/s?",
                        "yes": {
                            "question": "¿Es el hermano MAYOR?",
                            "yes": {
                                "answer": "Choso",
                                "image": "choso.png"
                            },
                            "no": {
                                "answer": "Yuji Itadori",
                                "image": "itadori.png"
                            }
                        },
                        "no": {
                            "question": "¿Tu personaje es relacionado con plantas y naturaleza?",
                            "yes": {
                                "answer": "Hanami",
                                "image": "hanami.png"
                            },
                            "no": {
                                "question": "¿Tu personaje tiene un solo ojo?",
                                "yes": {
                                    "answer": "Jogo",
                                    "image": "jogo.png"
                                },
                                "no": {
                                    "question": "¿Es aliado de Kenjaku?",
                                    "yes": {
                                        "question": "¿Tiene cabello color gris / plateado?",
                                        "yes": {
                                            "answer": "Mahito",
                                            "image": "mahito.png"
                                        },
                                        "no": {
                                            "answer": "Dagón",
                                            "image": "dagon.png"
                                        }
                                    },
                                    "no": {
                                        "question": "¿Tiene aproximadamente 1,000 años?",
                                        "yes": {
                                            "answer": "Kenjaku",
                                            "image": "kenjaku.png"
                                        },
                                        "no": {
                                            "answer": "Rika Orimoto",
                                            "image": "rika.png"
                                        }
                                    }
                                }
                            }
                        }
                    }
                },
                "no": {
                    "question": "¿Es un Hechicero?",
                    "yes": {
                        "question": "¿Pertenece a la escuela de hechicería de Kioto?",
                        "yes": {
                            "question": "¿Aparece siempre que su BRO lo necesita?",
                            "yes": {
                                "answer": "Aoi Todo El BESTO FRIENDO",
                                "image": "aoi.png"
                            },
                            "no": {
                                "answer": "Mechamaru",
                                "image": "mechamaru.png"
                            }
                        },
                        "no": {
                            "question": "¿Es un hechicero categoría ESPECIAL?",
                            "yes": {
                                "question": "¿Es el mejor amigo de SATORU GOJO?",
                                "yes": {
                                    "answer": "Suguru Geto",
                                    "image": "suguru.png"
                                },
                                "no": {
                                    "answer": "Yuta Okkotsu",
                                    "image": "yuta.png"
                                }
                            },
                            "no": {
                                "question": "¿Heredó la maldición del clan Zen'in (No poseé energia maldita a cambio de un físico sobre-humano)?",
                                "yes": {
                                    "question": "¿Tu personaje tiene hijos?",
                                    "yes": {
                                        "answer": "Toji Fushiguro",
                                        "image": "toji.png"
                                    },
                                    "no": {
                                        "answer": "Maki Zen'in",
                                        "image": "maki.png"
                                    }
                                },
                                "no": {
                                    "question": "¿Es estudiante de en la escuela de hechicería de Tokyo?",
                                    "yes": {
                                        "question": "¿Es estudiante de primer grado?",
                                        "yes": {
                                            "question": "¿Es usuario de la técnica maldita de las 10 sombras?",
                                            "yes": {
                                                "answer": "Megumi Fushiguro",
                                                "image": "megumi.png"
                                            },
                                            "no": {
                                                "answer": "Yuji Itadori",
                                                "image": "itadori.png"
                                            }
                                        },
                                        "no": {
                                            "answer": "Toge Inumaki",
                                            "image": "toge.png"
                                        }
                                    },
                                    "no": {
                                        "answer": "Kento Nanami",
                                        "image": "nanami.png"
                                    }
                                }
                            }
                        }
                    },
                    "no": {
                        "question": "¿Se adapta a las técnicas malditas mientras las recibe?",
                        "yes": {
                            "answer": "General Divino Ocho Empuñadoras Mahoraga",
                            "image": "mahoraga.png"
                        },
                        "no": {
                            "answer": "Rika Orimoto",
                            "image": "rika.png"
                        }
                    }
                }
            }
        }

        # Configuración de la ventana principal
        self.window = tk.Tk()
        self.window.title("¡Akinator!")
        
         # Cargar el fondo GIF animado
        self.background_gif = PhotoImage(file="bg.png")  # Carga el GIF animado
        self.bg_width, self.bg_height = self.background_gif.width(), self.background_gif.height()

        # Configurar el tamaño de la ventana al tamaño del fondo
        self.window.geometry(f"{self.bg_width}x{self.bg_height}")  # Ajusta el tamaño de la ventana

        # Crear una etiqueta para mostrar el fondo
        self.background_label = tk.Label(self.window, image=self.background_gif)
        self.background_label.place(relwidth=1, relheight=1)  # La etiqueta cubre toda la ventana
        
        self.label = tk.Label(self.window, text="¡Bienvenido al Akinator de Jujutsu Kaisen!", font=("Roboto", 35), wraplength=1280)
        self.label.pack(pady=20)

        self.continue_button = tk.Button(self.window, text="Comenzar", font=("Roboto", 40), command=self.start_game)
        self.continue_button.pack(pady=200)

        self.yes_button = tk.Button(self.window, text="Sí", font=("Roboto", 50), command=lambda: self.next_question("yes"))
        self.no_button = tk.Button(self.window, text="No", font=("Roboto", 50), command=lambda: self.next_question("no"))

        self.yes_button.pack_forget() 
        self.no_button.pack_forget()  

        self.current_node = None
        
        
    def start_game(self):
        """Comienza el juego y muestra la primera pregunta"""

        self.label.config(text=self.tree["question"])

        self.continue_button.pack_forget()  
        self.yes_button.pack(side="left", padx=150)
        self.no_button.pack(side="right", padx=150)

        # Iniciar en el nodo raíz
        self.current_node = self.tree

    def next_question(self, answer):
        """Función para avanzar según la respuesta del usuario (sí/no)"""
        if "question" in self.current_node:
            self.current_node = self.current_node[answer]
            self.label.config(text=self.current_node["question"])
        elif "answer" in self.current_node:
            result_text = f"¡Tu personaje es: {self.current_node['answer']}!"
            image_path = self.current_node.get("image")
            self.show_result_window(result_text, image_path)
            self.reset_game()

    def show_result_window(self, result_text, image_path):
        """Muestra el resultado en una ventana emergente personalizada con el texto y la imagen"""
        result_window = tk.Toplevel(self.window)
        result_window.title("¡Resultado!")

        result_label = tk.Label(result_window, text=result_text, font=("Roboto", 12), wraplength=300)
        result_label.pack(pady=10, padx=10)

        # Cargar y redimensionar la imagen
        try:
            img = Image.open(image_path)
            img = img.resize((300, 300)) 
            img_tk = ImageTk.PhotoImage(img)
            
            image_label = tk.Label(result_window, image=img_tk)
            image_label.image = img_tk
            image_label.pack(pady=10)
        except Exception as e:
            print(f"Error al cargar la imagen: {e}")

        close_button = tk.Button(result_window, text="Cerrar", command=result_window.destroy)
        close_button.pack(pady=10)

        result_window.geometry("600x600")  # Tamaño base de la ventana
        result_window.update_idletasks()

    def reset_game(self):
        """Reinicia el juego cuando se ha llegado a una respuesta final"""
        self.current_node = None
        self.label.config(text="¡Bienvenido al Akinator de Jujutsu Kaisen!")
        
        self.continue_button.pack(pady=200)
        self.yes_button.pack_forget()  
        self.no_button.pack_forget()   

    def start_game_loop(self):
        """Inicia el bucle principal de la ventana"""
        self.window.mainloop()

if __name__ == "__main__":
    akinator = Akinator()
    akinator.start_game_loop()
