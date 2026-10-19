def menu_pilas():
    pila = []
    while True:
        print("\n--- MENU PILAS ---")
        print("1. INSERTAR PILA")
        print("2. BORRAR PILA")
        print("3. LISTAR PILA")
        print("4. SALIR")

        opcion = input("ELIGE UNA OPCION: ")

        if opcion == "1":
            num = input("INGRESA UN NUMERO: ")
            pila.append(num)
            print(f"{num} SE AGREGADO A LA PILA.")
        elif opcion == "2":
            if pila:
                eliminado = pila.pop()
                print(f"ELEMENTO ELIMINADO: {eliminado}")
            else:
                print("LA PILA ESTA VACIA.")
        elif opcion == "3":
            print("PILA ACTUAL:", pila)
        elif opcion == "4":
            break
        else:
            print("OPCION INVALIDA.")

    repetir = input("¿DESEAS EJECUATR NUEVAMENTE EL PROGRAMA? (s/n): ")
    if repetir.lower() == "s":
        menu_pilas()

menu_pilas()
