package aula12_veiculos;

class bicicleta extends veiculo {
    public bicicleta(String codigo, String descricao, String marca, String modelo) {
        super(codigo, descricao, marca, modelo);
    }

    // M�todos espec�ficos para Bicicleta
    public void checkList() {
        super.checkList();  // Chama o m�todo da classe base
        System.out.println("Verificando as condi��es das rodas, corrente e freios da bicicleta...");
    }

    public void adjust() {
        super.adjust();  // Chama o m�todo da classe base
        System.out.println("Ajustando os freios, calibrando os pneus e lubrificando a corrente da bicicleta...");
    }

    public void cleanup() {
        super.cleanup();  // Chama o m�todo da classe base
        System.out.println("Lavando a bicicleta, limpando as rodas e o quadro...");
    }
}
