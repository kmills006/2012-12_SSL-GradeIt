<?

	include "models/viewModel.php";
	$view = new viewModel();

	$view->getView( "views/header.php" );
	$view -> getView( "views/register.php" );
	$view -> getView( "views/footer.php" );

?>