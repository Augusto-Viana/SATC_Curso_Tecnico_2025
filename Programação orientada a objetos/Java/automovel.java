package aula12_veiculos;

class automovel extends veiculo {
    public automovel(String codigo, String descricao, String marca, String modelo) {
        super(codigo, descricao, marca, modelo);
    }

    public void checkList() {
        super.checkList();  // Chama o m�todo da classe base
        System.out.println("Verificando condi��es do motor, pneus e sistema de freios do autom�vel...");
    }

    public void adjust() {
        super.adjust();  // Chama o m�todo da classe base
        System.out.println("Realizando ajustes no motor, alinhamento e troca de �leo do autom�vel...");
    }

    public void cleanup() {
        super.cleanup();  // Chama o m�todo da classe base
        System.out.println("Lavando o carro, limpando os vidros e aspirando o interior do autom�vel...");
    }
}
