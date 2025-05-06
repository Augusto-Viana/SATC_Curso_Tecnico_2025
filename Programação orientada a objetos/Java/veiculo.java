
import java.util.Scanner;

class veiculo {
    protected String codigo;
    protected String descricao;
    protected String marca;
    protected String modelo;

    public veiculo(String codigo, String descricao, String marca, String modelo) {
        this.codigo = codigo;
        this.descricao = descricao;
        this.marca = marca;
        this.modelo = modelo;
    }

    public String getCodigo() {
        return codigo;
    }
    public String getDescricao() {
        return descricao;
    }
    public String getMarca() {
        return marca;
    }
    public String getModelo() {
        return modelo;
    }

    public void checkList() {
        System.out.println("Verificando as condi��es gerais do ve�culo...");
    }

    public void adjust() {
        System.out.println("Realizando ajustes e manuten��o no ve�culo...");
    }

    public void cleanup() {
        System.out.println("Realizando a limpeza do ve�culo...");
    }

    public void exibirInformacoes() {
        System.out.println("C�digo: " + codigo);
        System.out.println("Descri��o: " + descricao);
        System.out.println("Marca: " + marca);
        System.out.println("Modelo: " + modelo);
    }

    // M�todos para ser chamado nas classes filhas
    public void realizarServicos() {
        checkList();
        adjust();
        cleanup();
    }
}

class Oficina {
    public void realizarServico(veiculo veiculo) {
        veiculo.realizarServicos();
    }
}

