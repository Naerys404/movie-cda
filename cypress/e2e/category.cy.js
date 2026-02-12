describe('category', () => {
  it('add category passes', () => {
    //I arrange initialiser
    cy.visit('localhost:8000/category/add')
    const categoryName = "fantastique"
    
    //II act action de l'utilisateur
	//1 sélectionner le champ name
	const inputName = cy.get('[name="category[name]"]')
	//2 remplir le champ
	inputName.type(categoryName)
	//3 sélectionner le bouton submit
	const submit = cy.get('[name="category[save]"]')
	//4 cliquer sur le bouton submit
	submit.click()

	//III assert
	//1 vérifier si la zone de message est affichée
	const zone = cy.get('.flash-notice')
	//2 vérifier si le texte : La category à été ajouté est affiché
	zone.contains('la category a été ajouté')
  })
  //test doublon
  it( 'add category fail : doublon', () => {
	//I arrange initialiser
    cy.visit('localhost:8000/category/add')
    const categoryName = "fantastique"
    
    //II act action de l'utilisateur
	//1 sélectionner le champ name
	const inputName = cy.get('[name="category[name]"]')
	//2 remplir le champ
	inputName.type(categoryName)
	//3 sélectionner le bouton submit
	const submit = cy.get('[name="category[save]"]')
	//4 cliquer sur le bouton submit
	submit.click()

	//III assert
	//1 vérifier si la zone de message est affichée
	const zone = cy.get('.flash-notice')
	//2 vérifier si le texte : La category existe déja
	zone.contains('la category existe déjà')
  })
  it('add category name to small', () => {
	//I arrange initialiser
    cy.visit('localhost:8000/category/add')
    const categoryName = "a"
    
    //II act action de l'utilisateur
	//1 sélectionner le champ name
	const inputName = cy.get('[name="category[name]"]')
	//2 remplir le champ
	inputName.type(categoryName)
	//3 sélectionner le bouton submit
	const submit = cy.get('[name="category[save]"]')
	//4 cliquer sur le bouton submit
	submit.click()

	//III assert
	//1 vérifier si la zone de message est affichée
	const zone = cy.get('#category_name_error1')
	//2 vérifier si le texte : La category à été ajouté est affiché
	zone.contains('Le nom est trop court')
  })
    it('add category name to long', () => {
	//I arrange initialiser
    cy.visit('localhost:8000/category/add')
    const categoryName = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
    
    //II act action de l'utilisateur
	//1 sélectionner le champ name
	const inputName = cy.get('[name="category[name]"]')
	//2 remplir le champ
	inputName.type(categoryName)
	//3 sélectionner le bouton submit
	const submit = cy.get('[name="category[save]"]')
	//4 cliquer sur le bouton submit
	submit.click()

	//III assert
	//1 vérifier si la zone de message est affichée
	const zone = cy.get('#category_name_error1')
	//2 vérifier si le texte : La category à été ajouté est affiché
	zone.contains('Le nom est trop long')
  })
    it('add category with no name', () => {
	//I arrange initialiser
    cy.visit('localhost:8000/category/add')
   
    //II act action de l'utilisateur
	//1 sélectionner le champ name
	const submit = cy.get('[name="category[save]"]')
	//4 cliquer sur le bouton submit
	submit.click()

	//III assert
	//1 vérifier si la zone de message est affichée
	const zone = cy.get('#category_name_error1')
	//2 vérifier si le texte : La category à été ajouté est affiché
	zone.contains('La category est vide')
  })
  
})