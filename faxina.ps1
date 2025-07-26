# Script de Limpeza e Otimização do Windows
# Execute como Administrador para melhores resultados.
# Autor: Adaptado para suas necessidades

Write-Host "=== LIMPEZA E OTIMIZAÇÃO DO WINDOWS ===" -ForegroundColor Green
Write-Host "Este script realizará as seguintes ações:"
Write-Host "1. Limpar arquivos temporários"
Write-Host "2. Limpar cache do sistema (Prefetch, Temp, etc.)"
Write-Host "3. Limpar Lixeira"
Write-Host "4. Limpar arquivos de hibernação (opcional)"
Write-Host "5. Desfragmentar disco (HDD apenas)"
Write-Host "6. Otimizar SSD (TRIM)"
Write-Host "======================================"

# Solicitar confirmação
$confirma = Read-Host "Deseja continuar? (S/N)"
if ($confirma -ne "S" -and $confirma -ne "s") {
    Write-Host "Script cancelado." -ForegroundColor Yellow
    exit
}

# Função para limpar pastas temporárias
function LimparTemporarios {
    Write-Host "Limpando arquivos temporários..." -ForegroundColor Cyan
    Remove-Item -Path "$env:TEMP\*" -Force -Recurse -ErrorAction SilentlyContinue
    Remove-Item -Path "C:\Windows\Temp\*" -Force -Recurse -ErrorAction SilentlyContinue
    Remove-Item -Path "$env:LOCALAPPDATA\Temp\*" -Force -Recurse -ErrorAction SilentlyContinue
}

# Função para limpar Prefetch
function LimparPrefetch {
    Write-Host "Limpando Prefetch..." -ForegroundColor Cyan
    Remove-Item -Path "C:\Windows\Prefetch\*" -Force -Recurse -ErrorAction SilentlyContinue
}

# Função para limpar Lixeira
function LimparLixeira {
    Write-Host "Esvaziando Lixeira..." -ForegroundColor Cyan
    Clear-RecycleBin -Force -ErrorAction SilentlyContinue
}

# Função para desativar hibernação (opcional)
function DesativarHibernacao {
    $hibernacao = Read-Host "Desativar arquivo de hibernação (hiberfil.sys)? Isso libera espaço. (S/N)"
    if ($hibernacao -eq "S" -or $hibernacao -eq "s") {
        Write-Host "Desativando hibernação..." -ForegroundColor Cyan
        powercfg.exe /hibernate off
    }
}

# Função para limpeza via Disk Cleanup (Cleanmgr)
function LimpezaDisco {
    Write-Host "Executando Limpeza de Disco..." -ForegroundColor Cyan
    cleanmgr /sagerun:1 | Out-Null
}

# Função para otimizar unidades (HDD/SSD)
function OtimizarDiscos {
    Write-Host "Otimizando discos..." -ForegroundColor Cyan
    $unidades = Get-Volume | Where-Object { $_.DriveType -eq 'Fixed' } | Select-Object DriveLetter

    foreach ($unidade in $unidades) {
        $letra = $unidade.DriveLetter
        if ($letra) {
            $tipo = Get-PhysicalDisk | Where-Object { $_.MediaType -eq 'SSD' }
            if ($tipo) {
                Write-Host "Otimizando SSD ($letra`:): TRIM..." -ForegroundColor Magenta
                Optimize-Volume -DriveLetter $letra -ReTrim -Verbose
            } else {
                Write-Host "Desfragmentando HDD ($letra`:)" -ForegroundColor Magenta
                Defrag.exe $letra`: /U /V
            }
        }
    }
}

# Executar todas as funções
LimparTemporarios
LimparPrefetch
LimparLixeira
DesativarHibernacao
LimpezaDisco
OtimizarDiscos

# Finalização
Write-Host "Limpeza concluída com sucesso!" -ForegroundColor Green
Write-Host "Recomendações finais:"
Write-Host "- Verifique aplicativos não utilizados em 'Configurações > Aplicativos'"
Write-Host "- Considere usar ferramentas como CCleaner para limpeza adicional (opcional)"
Write-Host "- Reinicie o computador para aplicar todas as alterações"

Read-Host "Pressione Enter para sair"