import pandas as pd
import pyautogui as pg
from time import sleep

arquivo = "dados.xlsx"

sleep(5) # Dá tempo para você mudar para a janela onde quer digitar

df = pd.read_excel(arquivo)

# --- OPÇÃO 1: Iterar diretamente sobre a coluna 'cod' (mais comum e direta) ---
if 'cod' in df.columns:
    print("Iniciando a digitação dos códigos...")
    for codigo in df['cod']: # Itera diretamente sobre os valores da coluna 'cód'
        pg.write(str(codigo)) # Converte para string para garantir que pyautogui possa escrever
        pg.press("enter")
        sleep(0.2)
    print("Códigos digitados com sucesso!")
else:
    print("Erro: A coluna 'cod' não foi encontrada na planilha. Verifique o nome da coluna.")

