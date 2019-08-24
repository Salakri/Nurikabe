<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/22
 * Time: 17:46
 */

namespace Gaming;


class Games extends Table
{

    protected $site;
    protected $tableName;

    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "game");
    }

    /**
     * Get a case by id
     * @param $id The case by ID
     * @returns Object that represents the case if successful,
     *  null otherwise.
     */
    public function get($id) {
        $users = new Users($this->site);
        $usersTable = $users->getTableName();

        $sql = <<<SQL
SELECT *
from $this->tableName
where id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return null;
        }

        return new ClientCase($statement->fetch(\PDO::FETCH_ASSOC));

    }

    public function insert(Game $game) {
        $sql = <<<SQL
insert into $this->tableName(userid, gamesize, game)
values(?, ?, ?)
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($game->getUserid(), $game->getGamesize(), $game->getGame()));

        return $pdo->lastInsertId();
    }


    public function getGame(Game $game) {
        $sql = <<<SQL
SELECT * FROM $this->tableName
WHERE userid =? and gamesize=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($game->getUserid(), $game->getGamesize()));

        if($statement->rowCount() === 0) {
            return null;
        }

        return new Game($statement->fetch(\PDO::FETCH_ASSOC));
    }



    /*public function getCases(){
        $users = new Users($this->site);
        $usersTable = $users->getTableName();

        $sql = <<<SQL
SELECT c.id, c.client, client.name as clientName, c.agent, agent.name as agentName, number, summary, status
from $this->tableName c
inner join $usersTable agent
on c.agent = agent.id
inner join $usersTable client
on c.client = client.id
order by status desc, number
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $cases = array();
        foreach($statement as $case){
            $cases[] = new ClientCase($case);
        }

        return $cases;
    }*/

    public function delete($id) {
        $sql = <<<SQL
DELETE FROM $this->tableName
WHERE id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));

    }

    public function update(Game $game){
        $sql =<<<SQL
UPDATE $this->tableName
SET game=?
where id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array(
            $game->getGame(), $game->getId()));

        if($statement->rowCount() === 0) {
            return null;
        }

        return new Game($statement->fetch(\PDO::FETCH_ASSOC));

    }

}