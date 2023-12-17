function crearEstructuraCarpetas {
    $estructura = @{
        'proyecto' = @{
            'app' = @('config', 'models', 'controllers', 'core')
            'include' = @()
            'lib' = @()
            'public' = @()
            'test' = @()
            'views' = @('css')
        }
    }

    foreach ($carpeta_principal in $estructura.Keys) {
        $carpeta_path = Join-Path (Get-Location) $carpeta_principal

        if (-not (Test-Path $carpeta_path)) {
            New-Item -Path $carpeta_path -ItemType Directory | Out-Null
            Write-Host "Creada la carpeta: $carpeta_principal"
        }

        foreach ($subcarpeta in $estructura[$carpeta_principal].Keys) {
            $subcarpeta_path = Join-Path $carpeta_path $subcarpeta

            if (-not (Test-Path $subcarpeta_path)) {
                New-Item -Path $subcarpeta_path -ItemType Directory | Out-Null
                Write-Host "Creada la subcarpeta: $subcarpeta en $carpeta_principal"
            }

            foreach ($subcarpeta_interna in $estructura[$carpeta_principal][$subcarpeta]) {
                $subcarpeta_interna_path = Join-Path $subcarpeta_path $subcarpeta_interna

                if (-not (Test-Path $subcarpeta_interna_path)) {
                    New-Item -Path $subcarpeta_interna_path -ItemType Directory | Out-Null
                    Write-Host "Creada la subcarpeta: $subcarpeta_interna en $subcarpeta"
                }
            }
        }
    }
}

crearEstructuraCarpetas
