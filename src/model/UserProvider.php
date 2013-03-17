<?php
namespace Model
{
	use Symfony\Component\Security\Core\User\UserProviderInterface;
	use Symfony\Component\Security\Core\User\UserInterface;
	use Symfony\Component\Security\Core\User\User;
	use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
	use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

	/**
	 * provide users to the security service
	 */
	class UserProvider extends BaseModel implements UserProviderInterface
	{
		public function loadUserByUsername( $email )
		{
			$email = strtolower( $email );
			$sql = <<<SQL
SELECT
	`email`,
	`password`,
	`roles`
FROM
	`user`
WHERE
	`status` = 'active' AND
	email = ?
SQL;
			$stmt = $this->db->executeQuery( $sql, array( $email ) );
			if ( !$user = $stmt->fetch() )
			{
				throw new UsernameNotFoundException( sprintf( 'Username "%s" does not exist.', $email ) );
			}

			return new User(
				$user['email'],
				$user['password'],
				explode(',', $user['roles']),
				true,
				true,
				true,
				true );
		}

		public function refreshUser( UserInterface $user )
		{
			if ( !$user instanceof User )
			{
				throw new UnsupportedUserException( sprintf('Instance of "%s" are not supported'), get_class( $user ) );
			}

			return $this->loadUserByUsername( $user->getUsername() );
		}

		public function supportsClass($class)
		{
			return $class === 'Symfony\Component\Security\Core\User\User';
		}
	}
}
