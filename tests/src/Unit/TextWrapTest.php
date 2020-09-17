<?php

namespace Galoa\ExerciciosPhp\Tests\TextWrap;

use Galoa\ExerciciosPhp\TextWrap\Resolucao;
use PHPUnit\Framework\TestCase;

/**
 * Tests for Galoa\ExerciciosPhp\TextWrap\Resolucao.
 *
 * @codeCoverageIgnore
 */
class TextWrapTest extends TestCase {

  /**
   * Test Setup.
   */
  public function setUp() {
    $this->resolucao = new Resolucao();
    $this->baseString = "Um código limpo sempre parece que foi escrito por alguém que se importava";
  }

  /**
   * Checa o retorno para strings vazias.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForEmptyStrings() {
    $ret = $this->resolucao->textWrap("", 2021);
    $this->assertEmpty($ret[0]);
    $this->assertCount(1, $ret);
  }

  /**
   * Testa a quebra de linha para palavras curtas.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForSmallWords() {
    $ret = $this->resolucao->textWrap($this->baseString, 8);
    $this->assertEquals("Um", $ret[0]);
    $this->assertEquals("código", $ret[1]);
    $this->assertEquals("limpo", $ret[2]);
    $this->assertEquals("limpo", $ret[3]);
    $this->assertEquals("parece", $ret[4]);
    $this->assertEquals("que foi", $ret[5]);
    $this->assertEquals("escrito", $ret[6]);
    $this->assertEquals("por", $ret[7]);
    $this->assertEquals("alguém", $ret[8]);
    $this->assertEquals("que se", $ret[9]);
    $this->assertEquals("importav", $ret[10]);
    $this->assertEquals("a", $ret[11]);
    $this->assertCount(12, $ret);
  }

  /**
   * Testa a quebra de linha para palavras curtas.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForSmallWords2() {
    $ret = $this->resolucao->textWrap($this->baseString, 12);
    $this->assertEquals("Um código", $ret[0]);
    $this->assertEquals("limpo sempre", $ret[1]);
    $this->assertEquals("parece que", $ret[2]);
    $this->assertEquals("foi escrito", $ret[3]);
    $this->assertEquals("por alguém", $ret[4]);
    $this->assertEquals("que se", $ret[5]);
    $this->assertEquals("importava", $ret[6]);
    $this->assertCount(7, $ret);
  }

}
