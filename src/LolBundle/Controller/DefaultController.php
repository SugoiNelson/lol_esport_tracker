<?php

namespace LolBundle\Controller;

// Import des outils nécessaires au fonctionnement du bundle

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

// Import des composants nécessaires au fonctionnement des formulaires

use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

// Import des entitées

use LolBundle\Entity\Player;
use LolBundle\Entity\Team;
use LolBundle\Entity\Game;

class DefaultController extends Controller
{
  /**
   * @Route("/", name="home")
   * @Template()
   */
  public function indexAction(Request $request)
  {
    $bdd = $this->getDoctrine()->getManager();

    $game = new Game();
    $form = $this->createFormBuilder($game)
            ->add('date', DateType::class)
            ->add('teamA', EntityType::class, array(
              'class' => 'LolBundle:Team',
              'choice_label' => 'name'
            ))
            ->add('teamB', EntityType::class, array(
              'class' => 'LolBundle:Team',
              'choice_label' => 'name'
            ))
            ->add('teamA_Score', IntegerType::class)
            ->add('teamB_Score', IntegerType::class)
            ->add('save', SubmitType::class, array(
              'label' => 'Ajouter un match !'
            ))
            ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      // Formulaire envoyé et valide

      $bdd->persist($game);
      $bdd->flush();

      $traduction = $this->get('translator');

      $this->get('session')->getFlashBag()->add(
        'success',
        $traduction->trans('games.added')
      );
    }

    $games = $bdd->getRepository('LolBundle:Game')->findAll();

    return array(
      'games' => $games,
      'form' => $form->createView()
    );
  }

  /**
   * @Route("/game/delete/{id}", name="delete_game")
   */
  public function deleteGame(Request $request, $id){

    $bdd = $this->getDoctrine()->getManager();
    $traduction = $this->get('translator');

    $game = $bdd->getRepository('LolBundle:Game')->findOneById($id);

    if(!empty($game)){
      // Le match existe
      $bdd->remove($game);
      $bdd->flush();

      $this->get('session')->getFlashBag()->add(
        'success',
        $traduction->trans('games.deleted')
      );
    }
    else{
      // Le match n'existe pas
      $this->get('session')->getFlashBag()->add(
        'danger',
        $traduction->trans('games.unknown')
      );
    }
    return $this->redirectToRoute('home');
  }


  /**
   * @Route("/teams", name="list_teams")
   * @Template()
   */
  public function teamAction(Request $request)
  {
    $bdd = $this->getDoctrine()->getManager();

    $team = new Team();
    $form = $this->createFormBuilder($team)
      ->add('name', TextType::class)
      ->add('save', SubmitType::class, array(
        'label' => 'Ajouter une équipe'
      ))
      ->getForm();

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
      $bdd->persist($team);
      $bdd->flush();

      $traduction = $this->get('translator');

      $this->get('session')->getFlashBag()->add(
        'success',
        $traduction->trans('teams.added')
      );
    }

    $teams = $bdd->getRepository('LolBundle:Team')->findAll();

    return array(
      'teams' => $teams,
      'form' => $form->createView()
    );
  }

  /**
   * @Route("/team/delete/{id}", name="delete_team")
   */
  public function deleteTeam(Request $request, $id){

    $bdd = $this->getDoctrine()->getManager();
    $traduction = $this->get('translator');

    $team = $bdd->getRepository('LolBundle:Team')->findOneById($id);

    if(!empty($team)){
      // L'équipe existe
      $bdd->remove($team);
      $bdd->flush();

      $this->get('session')->getFlashBag()->add(
        'success',
        $traduction->trans('teams.deleted')
      );
    }
    else{
      // L'équipe n'existe pas
      $this->get('session')->getFlashBag()->add(
        'danger',
        $traduction->trans('teams.unknown')
      );
    }
    return $this->redirectToRoute('home');
  }


    /**
     * @Route("/players", name="list_players")
     * @Template()
     */
    public function playerAction(Request $request)
    {
      $bdd = $this->getDoctrine()->getManager();

      $player = new Player();
      $form = $this->createFormBuilder($player)
        ->add('name', TextType::class)
        ->add('first_name', TextType::class)
        ->add('gender', TextType::class)
        ->add('team', EntityType::class, array(
          'class' => 'LolBundle:Team',
          'choice_label' => 'name'
        ))
        ->add('save', SubmitType::class, array(
          'label' => 'Ajouter un joueur'
        ))
        ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()){
        $bdd->persist($player);
        $bdd->flush();

        $traduction = $this->get('translator');

        $this->get('session')->getFlashBag()->add(
          'success',
          $traduction->trans('players.added')
        );
      }

      $players = $bdd->getRepository('LolBundle:Player')->findAll();

      return array(
        'players' => $players,
        'form' => $form->createView()
      );
    }

    /**
     * @Route("/players/delete/{id}", name="delete_player")
     */
    public function deletePlayer(Request $request, $id){

      $bdd = $this->getDoctrine()->getManager();
      $traduction = $this->get('translator');

      $player = $bdd->getRepository('LolBundle:Player')->findOneById($id);

      if(!empty($player)){
        // Le joueur existe
        $bdd->remove($player);
        $bdd->flush();

        $this->get('session')->getFlashBag()->add(
          'success',
          $traduction->trans('players.deleted')
        );
      }
      else{
        // Le joueur n'existe pas
        $this->get('session')->getFlashBag()->add(
          'danger',
          $traduction->trans('players.unknown')
        );
      }
      return $this->redirectToRoute('home');
    }


}
