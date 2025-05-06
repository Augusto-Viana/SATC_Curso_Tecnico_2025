package aula12_veiculos;

class automovel extends veiculo {
    public automovel(String codigo, String descricao, String marca, String modelo) {
        super(codigo, descricao, marca, modelo);
    }

    public void checkList() {
        super.checkList();  // Chama o método da classe base
        System.out.println("Verificando condições do motor, pneus e sistema de freios do automóvel...");
    }

    public void adjust() {
        super.adjust();  // Chama o método da classe base
        System.out.println("Realizando ajustes no motor, alinhamento e troca de óleo do automóvel...");
    }

    public void cleanup() {
        super.cleanup();  // Chama o método da classe base
        System.out.println("Lavando o carro, limpando os vidros e aspirando o interior do automóvel...");
    }
}
