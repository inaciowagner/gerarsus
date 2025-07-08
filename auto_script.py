import pandas as pd

def excel_coluna_para_lista(arquivo_excel, nome_planilha, nome_coluna):
    """
    Lê uma planilha Excel e transforma uma coluna específica em uma lista Python.
    
    Parâmetros:
    - arquivo_excel: Caminho do arquivo Excel (string)
    - nome_planilha: Nome da planilha no arquivo Excel (string)
    - nome_coluna: Nome da coluna que será convertida para lista (string)
    
    Retorno:
    - Uma lista Python com os valores da coluna especificada
    """
    
    try:
        # Ler o arquivo Excel
        df = pd.read_excel(arquivo_excel, sheet_name=nome_planilha)
        
        # Verificar se a coluna existe no DataFrame
        if nome_coluna not in df.columns:
            raise ValueError(f"A coluna '{nome_coluna}' não foi encontrada na planilha.")
            
        # Converter a coluna para lista e remover valores NaN
        lista = df[nome_coluna].dropna().tolist()
        
        return lista
        
    except FileNotFoundError:
        print(f"Erro: Arquivo '{arquivo_excel}' não encontrado.")
        return []
    except Exception as e:
        print(f"Ocorreu um erro: {str(e)}")
        return []

# Exemplo de uso:
if __name__ == "__main__":
    # Configurações - altere conforme necessário
    arquivo = "dados.xlsx"          # Nome do arquivo Excel
    planilha = "Sheet1"             # Nome da planilha
    coluna = "Códigos"              # Nome da coluna
    
    # Chamada da função
    lista_codigos = excel_coluna_para_lista(arquivo, planilha, coluna)
    
    # Exibir resultados
    print(f"Lista gerada a partir da coluna '{coluna}':")
    print(lista_codigos)
    print(f"Tipo do objeto: {type(lista_codigos)}")
    print(f"Quantidade de itens: {len(lista_codigos)}")