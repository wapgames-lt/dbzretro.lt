<?php

namespace LegacyDbz\Parties\Repositories;

use LegacyDbz\Core\Collection;
use LegacyDbz\Core\Db;
use LegacyDbz\Parties\DTO\PartyInvite;

class PartyInvitesRepository
{
    public function findById($id)
    {
        $stmt = Db::prepare("SELECT * FROM `party_invites` WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $result = Db::fetch($stmt);

        if (!$result) {
            return null;
        }

        return PartyInvite::fromArray($result);
    }

    public function findByInviteeId($inviteeId)
    {
        $stmt = Db::prepare("SELECT * FROM `party_invites` WHERE invitee_id = :invitee_id ORDER BY id DESC");
        $stmt->execute(['invitee_id' => $inviteeId]);

        $collection = new Collection();
        foreach (Db::fetchAll($stmt) as $inviteArray) {
            $collection->add(PartyInvite::fromArray($inviteArray));
        }

        return $collection;
    }

    public function findByInviterId($inviterId)
    {
        $stmt = Db::prepare("SELECT * FROM `party_invites` WHERE inviter_id = :inviter_id ORDER BY id DESC LIMIT 10");
        $stmt->execute(['inviter_id' => $inviterId]);

        $collection = new Collection();
        foreach (Db::fetchAll($stmt) as $inviteArray) {
            $collection->add(PartyInvite::fromArray($inviteArray));
        }

        return $collection;
    }

    public function findByIniteeIdAndStatus($inviteeId, $status)
    {
        $stmt = Db::prepare("SELECT * FROM `party_invites` WHERE invitee_id = :invitee_id AND status = :status");
        $stmt->execute([
            'invitee_id' => $inviteeId,
            'status' => $status,
        ]);

        $collection = new Collection();
        foreach (Db::fetchAll($stmt) as $inviteArray) {
            $collection->add(PartyInvite::fromArray($inviteArray));
        }

        return $collection;
    }

    public function save(PartyInvite $invite)
    {
        $stmt = Db::prepare("INSERT INTO party_invites (party_id, inviter_id, invitee_id) VALUES (:party_id, :inviter_id, :invitee_id)");
        $stmt->execute([
            'party_id' => $invite->partyId(),
            'inviter_id' => $invite->inviterId(),
            'invitee_id' => $invite->inviteeId(),
        ]);
    }

    public function changeStatus($id, $status)
    {
        $stmt = Db::prepare("UPDATE party_invites SET status = :status WHERE id = :id");
        $stmt->execute([
            'status' => $status,
            'id' => $id,
        ]);
    }

    public function deleteExpired()
    {
        $stmt = Db::prepare("DELETE FROM `party_invites` WHERE created_at < DATE_SUB(NOW(), INTERVAL 3 DAY)");
        $stmt->execute();
    }
}
