from collections import deque

def menu_colas():
    cola = deque()
    while True:
        print("\n--- MENU COLAS ---")
        print("1. INSERTAR COLA")
        print("2. BORRAR EN COLA")
        print("3. LISTAR EN COLA")
        print("4. SALIR")

        opcion = input("ELIGE UNA OPCION: ")

        if opcion == "1":
            num = input("INGRESA UN NUMERO: ")
            cola.append(num)
            print(f"{num} SE AGREGO A LA COLA.")
        elif opcion == "2":
            if cola:
                eliminado = cola.popleft()
                print(f"ELEMENTO ELIMINADO: {eliminado}")
            else:
                print("LA COLA ESTA VACIA.")
        elif opcion == "3":
            print("COLA ACTUAL:", list(cola))
        elif opcion == "4":
            break
        else:
            print("OPCION INVALIDA.")

    repetir = input("¿DESEAS EJECUTAR NEUVAMENTE EL PROGRAMA? (S/N): ")
    if repetir.lower() == "s":
        menu_colas()

menu_colas()
