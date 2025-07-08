import pandas as pd
import pyautogui as pg
from time import sleep
arquivo = "dados.xlsx"

sleep(5)

df = pd.read_excel(arquivo)
# print(df)

for i in df:
	texto = str(df[i])
	texto_2 = texto.split()
	texto = texto_2[1]
	pg.write(texto)
	pg.press("enter")
	sleep(2)

