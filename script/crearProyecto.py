import os

def crear_estructura_carpetas():
    estructura = {
        'proyecto': {
            'app': ['config', 'controllers', 'core'],
            'public': [],
            'test': [],
            'views': []
        }
    }

    for carpeta_principal, subcarpetas in estructura.items():
        carpeta_path = os.path.join(os.getcwd(), carpeta_principal)

        if not os.path.exists(carpeta_path):
            os.makedirs(carpeta_path)
            print(f'Creada la carpeta: {carpeta_principal}')

        for subcarpeta, subcarpetas_internas in subcarpetas.items():
            subcarpeta_path = os.path.join(carpeta_path, subcarpeta)
            if not os.path.exists(subcarpeta_path):
                os.makedirs(subcarpeta_path)
                print(f'Creada la subcarpeta: {subcarpeta} en {carpeta_principal}')

            for subcarpeta_interna in subcarpetas_internas:
                subcarpeta_interna_path = os.path.join(subcarpeta_path, subcarpeta_interna)
                if not os.path.exists(subcarpeta_interna_path):
                    os.makedirs(subcarpeta_interna_path)
                    print(f'Creada la subcarpeta: {subcarpeta_interna} en {subcarpeta}')

if __name__ == "__main__":
    crear_estructura_carpetas()
